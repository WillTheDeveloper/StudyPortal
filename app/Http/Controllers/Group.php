<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Group as UserGroup;
use Illuminate\Http\Request;

class Group extends Controller
{
    public function returnView($id)
    {
        return view('managegroups', [
            'groupstuff' => UserGroup::all()->where('id', $id)->find($id)
        ]);
    }

    public function new(Request $request)
    {
        $group = new UserGroup([
            'name' => $request->input('groupname'),
            'subject_id' => $request->input('subject')
        ]);

        $group->save();

        $group->User()->attach([$group->id ,auth()->user()->id]);

        return view('groups');
    }

    public function create()
    {
        return view('creategroup', [
            'subjects' => Subject::all()
        ]);
    }
}
