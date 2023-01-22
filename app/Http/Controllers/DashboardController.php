<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        return view('dashboard.dashboard', [
            'notifications' => auth()->user()->notifications()->paginate(10)
        ]);
    }
}
