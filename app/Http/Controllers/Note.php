<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Note extends Controller
{
    public function show()
    {
        $this->authorize('viewAny', \App\Models\Note::class);

        return view('notes.show', [
            'list' => \App\Models\Note::query()->where('notes.user_id', auth()->id())->paginate(10),
        ]);
    }

    public function create()
    {
        $this->authorize('create', \App\Models\Note::class);

        return view('notes.create');
    }

    public function newNote(Request $request)
    {
        $this->authorize('create', \App\Models\Note::class);

        $note = \App\Models\Note::query()->create(
            [
                'name' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => $request->user()->id,
                'private' => $request->input('private')
            ]
        );

        $note->save();

        return redirect(route('note.edit', $note->id));
    }

    public function save($id, Request $request) {
        $this->authorize('update', \App\Models\Note::query()->find($id));

        $note = \App\Models\Note::query()->where('notes.id', $id)->update(
            [
                'notes' => $request->input('comment'),
            ]
        );

        return redirect(route('note.show', $id));
    }

    public function view($id)
    {
        $this->authorize('view', \App\Models\Note::query()->find($id));

        return view('notes.view', [
            'render' => \App\Models\Note::query()->where('id', $id)->find($id)
        ]);
    }

    public function edit($id)
    {
        $this->authorize('update', \App\Models\Note::query()->find($id));

        return view('notes.edit', [
            'notes' => \App\Models\Note::query()->where('id', $id)->find($id)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->authorize('delete', \App\Models\Note::query()->find($id));

        return view('deletenote', [
            'confirm' => \App\Models\Note::query()->find($id)
        ]);
    }

    public function deleteConfirmed($id)
    {
        $this->authorize('delete', \App\Models\Note::query()->find($id));

        \App\Models\Note::query()->find($id)->delete();

        return redirect(route('note.show'));
    }

    public function makePrivate($id)
    {
        $this->authorize('update', \App\Models\Note::query()->find($id));

        \App\Models\Note::findOrFail($id)->update(
            [
                'private' => true
            ]
        );

        return redirect(route('note.show', $id));
    }

    public function makePublic($id)
    {
        $this->authorize('update', \App\Models\Note::query()->find($id));

        \App\Models\Note::findOrFail($id)->update(
            [
                'private' => false
            ]
        );

        return redirect(route('note.show', $id));
    }
}
