<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Note extends Controller
{
    public function show()
    {
        return view('note', [
            'list' => \App\Models\Note::query()->where('notes.user_id', auth()->id())->get('*')
        ]);
    }
}
