<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Subject extends Controller
{
    public function manage()
    {
        return view('subjects.manage', [
            'data' => \App\Models\Subject::query()->orderBy('subject')->paginate(15)
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function save(Request $request)
    {
        \App\Models\Subject::query()->create([
            'subject' => $request->input('subject'),
        ]);

        return redirect(route('communities.manage'));
    }

    public function setting($id)
    {
        return view('subjects.settings', [
            'subject' => \App\Models\Subject::find($id),
            'users' => \App\Models\Subject::find($id)->User()->orderBy('name')->paginate(6)
        ]);
    }

    public function updatesettings($id, Request $request)
    {
        \App\Models\Subject::query()->find($id)->update([
            'subject' => $request->input('subject')
        ]);

        Session::flash('updated');

        return redirect(route('communities.id', $id));
    }

    public function connect(Request $request)
    {
        \App\Models\User::query()
            ->where('email', $request->email)
            ->first()
            ->Subject()
            ->attach($request->input('subject'));
    }

    public function disconnect(Request $request)
    {
        \App\Models\User::query()
            ->where('email', $request->email)
            ->first()
            ->Subject()
            ->detach($request->input('subject'));
    }

    public function disconnectall(Request $request)
    {
        \App\Models\Subject::query()
            ->find($request->input('subject'))
            ->User()
            ->detach();
    }
}
