<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Timetable extends Controller
{
    public function view()
    {
        return view('timetable', [
            'monday' => \App\Models\Timetable::query()->where('timetables.weekday', 'Monday')->get('*'),
            'tuesday' => \App\Models\Timetable::query()->where('timetables.weekday', 'Tuesday')->get('*'),
            'wednesday' => \App\Models\Timetable::query()->where('timetables.weekday', 'Wednesday')->get('*'),
            'thursday' => \App\Models\Timetable::query()->where('timetables.weekday', 'Thursday')->get('*'),
            'friday' => \App\Models\Timetable::query()->where('timetables.weekday', 'Friday')->get('*'),
        ]);
    }
}
