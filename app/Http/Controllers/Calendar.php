<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        return view('calendar');
    }
}
