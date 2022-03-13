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

    public function create()
    {
        return view('newnote');
    }

    public function newNote(Request $request)
    {
        $note = \App\Models\Note::query()->create(
            [
                'name' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => $request->user()->id,
            ]
        );

        $note->save();

        return redirect(route('note.edit', $note->id));
    }

    public function edit($id)
    {
        return view('editnote');
    }
}
