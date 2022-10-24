<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        $month = Request()->query('month') ? '' : Carbon::today()->month;
        $year = Request()->query('year') ? '' : Carbon::today()->year;
//        $day = CarbonPeriod::start(Carbon::today()->startOfMonth()->toDate())->end(Carbon::today()->endOfMonth()->toDate())->toArray();

        return view('calendar', [
            'events' => \App\Models\Event::query()
                ->where('user_id', auth()->id())
                ->whereMonth('date', $month)
                ->whereYear('date', $year),

            'month' => $month,
            'year' => $year,

            'before' => Carbon::today()->subMonth()->endOfMonth()->dayOfWeek,
            'current' => Carbon::today()->months($month)->daysInMonth,
            'date' => Carbon::today()->months($month)->year($year),
            'test' => CarbonPeriod::start(Carbon::today()->startOfMonth()->toDate())->end(Carbon::today()->endOfMonth()->toDate())->toArray(),
            'next' => Carbon::today()->addMonth()->startOfMonth()->endOfWeek()->day,
        ]);
    }
}
