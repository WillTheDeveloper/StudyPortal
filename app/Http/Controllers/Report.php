<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report extends Controller
{
    public function overview()
    {
        return view('reports');
    }
}
