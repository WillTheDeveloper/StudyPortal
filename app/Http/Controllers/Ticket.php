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
                $this->tutorview();
                break;
            case false:
                $this->studentview();
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
                ->whereBelongsTo(\App\Models\User::find(auth()->id()))
                ->select('subjects.subject')
        ]);
    }

    public function new(Request $request)
    {

    }

    public function viewticket($id)
    {

    }
}
