<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Group as UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $group->User()->attach([auth()->user()->id]);

        return view('groups');
    }

    public function add($id)
    {
        return view('addusertogroup', [
            //TODO:Ensure that tutors cannot get added to groups.
            'users' => \App\Models\User::all()->except(\App\Models\User::query()->where('is_tutor', 1)->find('id')),
            'groupid' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $group = new UserGroup();

        $group->User()->attach([$request->input(['user-select'])]);

        return redirect(route('groups', $id));
    }

    public function delete($id)
    {
        UserGroup::query()->where('groups.id', $id)->select('*')->delete();
        $group = new UserGroup();
        $group->User()->detach();
        return redirect('groups');
    }

    public function create()
    {
        return view('creategroup', [
            'subjects' => Subject::all()
        ]);
    }
}
