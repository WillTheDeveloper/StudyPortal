<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewGroup;
use App\Models\Discussion;
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

    public function new(CreateNewGroup $request)
    {
        $request->validated();

        $group = new UserGroup([
            'name' => $request->input('groupname'),
            'subject_id' => $request->input('subject')
        ]);

        $group->save();

        $group->User()->attach([auth()->user()->id]);

        return redirect('groups');
    }

    public function add($id)
    {
        return view('addusertogroup', [
            'users' => \App\Models\User::all()->where('is_tutor', 0),
            'groupid' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $group = UserGroup::find($id);

        $users = $request->input(['user-select']);
        $group->User()->attach([$users]);

        return redirect(route('groups.manage', $id));
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

    public function edit($id)
    {
        return view('editgroup', [
            'group' => UserGroup::query()->find($id)
        ]);
    }

    public function updatename($id, Request $request)
    {
        UserGroup::all()->find($id)->update(
            [
                'name' => $request->input('groupname'),
            ]
        );

        return redirect(route('groups.manage', $id));
    }

    public function discussion($id)
    {
        return view('groupdiscussions', [
            'board' => Discussion::query()->where('discussions.group_id', $id)->orderByDesc('discussions.created_at')->paginate()
        ]);
    }

    public function newdiscussion($id)
    {

    }
}
