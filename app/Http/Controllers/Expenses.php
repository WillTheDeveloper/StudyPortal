<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Expenses extends Controller
{
    public function overview()
    {
        return view('expenses.overview', [
            'spendthismonth' => Purchase::query()
                ->whereMonth('purchased', '=', Carbon::today()->month)
                ->sum('cost')
        ]);
    }
}
