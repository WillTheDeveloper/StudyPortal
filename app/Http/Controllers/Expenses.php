<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Income;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Expenses extends Controller
{
    public function overview()
    {
        $thismonth = Carbon::today()->month;

        return view('expenses.overview', [
            'spendthismonth' => $spend = Purchase::query()
                ->whereMonth('purchased', '=', $thismonth)
                ->sum('cost'),
            'totalincome' => $income = Income::query()
                ->whereMonth('paid', '=', $thismonth)
                ->sum('amount'),
            'remaining' => $income - $spend,
            'categories' => Category::query()
                ->where('user_id', auth()->id())
                ->orderByDesc('title')
                ->get()
        ]);
    }
}
