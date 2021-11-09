<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kanban extends Controller
{
    public function list()
    {
        return view('kanban',
        [
            'kanban' => \App\Models\Kanban::all()->where('id', auth()->user()->id)
        ]);
    }

    public function view($id)
    {
        return view('viewkanban',
        [
            'kanban' => \App\Models\Kanban::all()->where('id', auth()->user()->id)
        ]);
    }
}
