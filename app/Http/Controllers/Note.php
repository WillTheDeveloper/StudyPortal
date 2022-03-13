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

    public function save($id, Request $request) {
        $note = \App\Models\Note::query()->where('notes.id', $id)->update(
            [
                'notes' => $request->input('comment'),
            ]
        );

        return redirect(route('note.show', $id));
    }

    public function view($id)
    {
        return view('viewnote', [
            'render' => \App\Models\Note::query()->where('id', $id)->find($id)
        ]);
    }

    public function edit($id)
    {
        return view('editnote', [
            'notes' => \App\Models\Note::query()->where('id', $id)->find($id)
        ]);
    }
}
