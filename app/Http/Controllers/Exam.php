<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exam extends Controller
{
    public function index()
    {
        return view('exam.exams');
    }
}
