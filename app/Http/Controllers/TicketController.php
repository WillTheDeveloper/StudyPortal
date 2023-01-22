<?php

namespace App\Http\Controllers;

use App\Mail\TicketCreated;
use App\Mail\TicketResolved;
use App\Models\Message;
use App\Models\Subject;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function switch(Request $request)
    {
        switch ($request->user()->is_tutor or $request->user()->is_admin)
        {
            case true:
                return $this->tutorview();
                break;
            case false:
                return $this->studentview();
                break;
        }
    }

    public function studentview()
    {
        $this->authorize('viewAnyStudent', Ticket::class);

        $request = Request();

        $subject = $request->query('subject');
        $status = $request->query('status');

        return view('tickets.studenttickets', [
            'tickets' => Ticket::query()
                ->where('student_id', auth()->id())
                ->when($subject, function ($query, $subject) {
                    $a = Subject::query()->firstWhere('subject', $subject)->id;
                    $query->where('subject_id', $a);
                })
                ->when($status, function ($query, $status) {
                    $query->where('status', $status);
                })
                ->paginate(20)
        ]);
    }

    public function tutorview()
    {
        $this->authorize('viewAnyTutor', Ticket::class);

        $request = Request();

        $subject = $request->query('subject');
        $status = $request->query('status');

        return view('tickets.tutortickets', [
            'tickets' => Ticket::query()
                ->where('tutor_id', auth()->id())
                ->when($subject, function ($query, $subject) {
                    $a = Subject::query()->firstWhere('subject', $subject)->id;
                    $query->where('subject_id', $a);
                })
                ->when($status, function ($query, $status) {
                    $query->where('status', $status);
                })
                ->paginate(20)
        ]);
    }

    public function create()
    {
        $this->authorize('create', \App\Models\Ticket::class);

        return view('tickets.create', [
            'subjects' => Subject::query()->get(),
            'tutors' => \App\Models\User::query()
                ->where('is_tutor', true)->get()
        ]);
    }

    public function new(Request $request)
    {
        $this->authorize('create',Ticket::class);

        $t = Ticket::query()->create([
            'student_id' => $request->user()->id,
            'tutor_id' => $request->input('tutor'),
            'question' => $request->input('question'),
            'subject_id' => $request->input('subject'),
            'details' => $request->input('details'),
            'status' => 'new'
        ]);

        Mail::to($request->user())->send(new TicketCreated(Ticket::query()->find($t->id)));

        return redirect(route('ticket.id', $t->id));
    }

    public function viewticket($id)
    {
        $this->authorize('view', Ticket::query()->find($id));

        return view('tickets.show', [
            'ticket' => Ticket::query()->findOrFail($id),
            'messages' => Message::query()
                ->where('ticket_id', $id)->get()
        ]);
    }

    public function resolved($id, Request $request)
    {
        $this->authorize('update',Ticket::query()->findOrFail($id));

        Ticket::query()->find($id)
            ->update([
                'status' => 'completed'
            ]);

        Mail::to($request->user())->send(new TicketResolved(Ticket::query()->find($id)));

        return redirect(route('ticket.id', $id));
    }
}
