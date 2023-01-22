<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function view()
    {
        return view('timetable.index', [
            'monday' => Timetable::query()
                ->where('timetables.user_id', auth()->id())
                ->where('timetables.weekday', 'Monday')
                ->get('*'),
            'tuesday' => Timetable::query()
                ->where('timetables.user_id', auth()->id())
                ->where('timetables.weekday', 'Tuesday')
                ->get('*'),
            'wednesday' => Timetable::query()
                ->where('timetables.user_id', auth()->id())
                ->where('timetables.weekday', 'Wednesday')
                ->get('*'),
            'thursday' => Timetable::query()
                ->where('timetables.user_id', auth()->id())
                ->where('timetables.weekday', 'Thursday')
                ->get('*'),
            'friday' => Timetable::query()
                ->where('timetables.user_id', auth()->id())
                ->where('timetables.weekday', 'Friday')
                ->get('*'),
        ]);
    }

    public function add()
    {
        $user=User::where('id',auth()->user()->id)->get();
        return view('timetable.add', [
            'subjects' => $user->Subject(),
        ]);
    }

    public function create(Request $request)
    {
        Timetable::query()->create(
            [
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'subject_id' => $request->input('subject'),
                'user_id' => auth()->id(),
                'weekday' => $request->input('weekday'),
                'room' => $request->input('room')
            ]
        );

        return redirect(route('timetable'));
    }
}
