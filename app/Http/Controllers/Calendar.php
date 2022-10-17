<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        $month = /*Request()->query('month') ? '' : */Carbon::now()->month;
        $year = /*Request()->query('year') ? '' : */Carbon::now()->year;

        return view('calendar', [
            'events' => \App\Models\Event::query()
                ->where('user_id', auth()->id())
                ->whereMonth('date', $month)
                ->whereYear('date', $year),

            'before' => Carbon::now()->subMonth()->endOfMonth()->dayOfWeek,
            'current' => Carbon::now()->months($month)->daysInMonth,
            'date' => Carbon::now()->months($month)->year($year),
            'next' => Carbon::now()->addMonth()->startOfMonth()->endOfWeek()->day,
        ]);
    }
}
