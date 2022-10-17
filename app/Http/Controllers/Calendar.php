<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        $month = Request()->query('month') ? '' : Carbon::now()->month;
        $year = Request()->query('year') ? '' : Carbon::now()->year;

        return view('calendar', [
            'events' => \App\Models\Event::query()
                ->where('user_id', auth()->id())
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->get()
        ]);
    }
}
