<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Api extends Controller
{
    public function view()
    {
        return view('keys.view',
        [
            'token' => auth()->user()->tokens()->get(),
        ]);
    }

    public function new() // GET REQUEST
    {
        return view('keys.new');
    }

    public function create() // POST REQUEST
    {

    }
}
