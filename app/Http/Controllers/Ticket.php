<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ticket extends Controller
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
        return view('studenttickets', [
            'tickets' => \App\Models\Ticket::query()
                ->where('student_id', auth()->id())
                ->paginate(20)
        ]);
    }

    public function tutorview()
    {
        return view('tutortickets', [
            'tickets' => \App\Models\Ticket::query()
                ->where('tutor_id', auth()->id())
                ->paginate(20)
        ]);
    }

    public function create()
    {
        return view('createticket', [
            'subjects' => Subject::query()
                ->select('subjects.subject')
        ]);
    }

    public function new(Request $request)
    {

    }

    public function viewticket($id)
    {
        return view('ticket', [
            'ticket' => \App\Models\Ticket::query()->findOrFail($id)
        ]);
    }
}
