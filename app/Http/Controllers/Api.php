<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Api extends Controller
{
    public function view()
    {
        return view('apikeys',
        [
            'token' => auth()->user()->tokens()->get(),
        ]);
    }

    public function new() // GET REQUEST
    {
        return view('apinew');
    }

    public function create() // POST REQUEST
    {

    }
}
