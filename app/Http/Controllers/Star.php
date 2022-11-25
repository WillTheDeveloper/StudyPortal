<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Star extends Controller
{
    public function starred()
    {
        return view('starred');
    }
}
