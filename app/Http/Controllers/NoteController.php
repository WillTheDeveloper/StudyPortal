<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function show()
    {
        $this->authorize('viewAny', \App\Models\Note::class);

        return view('notes.show', [
            'list' => Note::query()->where('notes.user_id', auth()->id())->paginate(10),
        ]);
    }

    public function create()
    {
        $this->authorize('create', Note::class);

        return view('notes.create');
    }

    public function newNote(Request $request)
    {
        $this->authorize('create', Note::class);

        $note = Note::query()->create(
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
        $this->authorize('update', Note::query()->find($id));

        $note = \App\Models\Note::query()->where('notes.id', $id)->update(
            [
                'notes' => $request->input('comment'),
            ]
        );

        return redirect(route('note.show', $id));
    }

    public function view($id)
    {
        $this->authorize('view', Note::query()->find($id));

        return view('notes.view', [
            'render' => Note::query()->where('id', $id)->find($id)
        ]);
    }

    public function edit($id)
    {
        $this->authorize('update',Note::query()->find($id));

        return view('notes.edit', [
            'notes' =>Note::query()->where('id', $id)->find($id)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->authorize('delete',Note::query()->find($id));

        return view('deletenote', [
            'confirm' => Note::query()->find($id)
        ]);
    }

    public function deleteConfirmed($id)
    {
        $this->authorize('delete',Note::query()->find($id));

        Note::query()->find($id)->delete();

        return redirect(route('note.show'));
    }

    public function makePrivate($id)
    {
        $this->authorize('update',Note::query()->find($id));

        Note::findOrFail($id)->update(
            [
                'private' => true
            ]
        );

        return redirect(route('note.show', $id));
    }

    public function makePublic($id)
    {
        $this->authorize('update',Note::query()->find($id));

        Note::findOrFail($id)->update(
            [
                'private' => false
            ]
        );

        return redirect(route('note.show', $id));
    }
}
