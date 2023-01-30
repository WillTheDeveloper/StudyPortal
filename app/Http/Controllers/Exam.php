<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Exam extends Controller
{
    public function index()
    {
        return view('exam.exams', [
            'upcoming' => \App\Models\Exam::query()
                ->where('tutor_id', auth()->id())
                ->whereDate('examdate', '>', Carbon::today()->toDate())
                ->get(),
            'current' => \App\Models\Exam::query()
                ->where('tutor_id', auth()->id())
                ->whereDate('examdate' , '=', Carbon::today()->toDate())
                ->get(),
            'past' => \App\Models\Exam::query()
                ->where('tutor_id', auth()->id())
                ->whereDate('examdate', '<', Carbon::today()->toDate())
                ->get()
        ]);
    }

    public function manage($id)
    {
        return view('exam.manage', [
            'exam' => \App\Models\Exam::query()->find($id)
        ]);
    }
}
