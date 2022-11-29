<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Subject extends Controller
{
    public function manage()
    {
        return view('managesubjects', [
            'data' => \App\Models\Subject::query()->orderBy('subject')->paginate(15)
        ]);
    }

    public function setting($id)
    {
        return view('subjectsettings', [
            'subject' => \App\Models\Subject::find($id)
        ]);
    }
}
