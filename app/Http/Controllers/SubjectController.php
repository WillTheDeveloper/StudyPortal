<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function manage()
    {
        return view('subjects.manage', [
            'data' => Subject::query()->orderBy('subject')->paginate(15)
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function save(Request $request)
    {
        Subject::query()->create([
            'subject' => $request->input('subject'),
        ]);

        return redirect(route('communities.manage'));
    }

    public function setting($id)
    {
        return view('subjects.settings', [
            'subject' => Subject::find($id),
            'users' => Subject::find($id)->User()->orderBy('name')->paginate(6)
        ]);
    }

    public function updatesettings($id, Request $request)
    {
        Subject::query()->find($id)->update([
            'subject' => $request->input('subject')
        ]);

        Session::flash('updated');

        return redirect(route('communities.id', $id));
    }

    public function connect(Request $request)
    {
        User::query()
            ->where('email', $request->email)
            ->first()
            ->Subject()
            ->attach($request->input('subject'));
    }

    public function disconnect(Request $request)
    {
        User::query()
            ->where('email', $request->email)
            ->first()
            ->Subject()
            ->detach($request->input('subject'));
    }

    public function disconnectall(Request $request)
    {
        Subject::query()
            ->find($request->input('subject'))
            ->User()
            ->detach();
    }
}
