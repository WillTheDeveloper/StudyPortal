<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function show()
    {
        if(auth()->user()->hasStripeId())
        {
            auth()->user()->syncStripeCustomerDetails();
        }
        return view('dashboard.dashboard', [
            'notifications' => auth()->user()->notifications()->paginate(10)
        ]);
    }
}
