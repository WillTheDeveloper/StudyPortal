<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewGroup;
use App\Models\Discussion;
use App\Models\Reply;
use App\Models\Subject;
use App\Models\Group as UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Group extends Controller
{
    public function returnView($id)
    {
        $this->authorize('view', UserGroup::find($id));

        return view('groups.manage', [
            'groupstuff' => UserGroup::all()->where('id', $id)->find($id)
        ]);
    }

    public function new(CreateNewGroup $request)
    {
        $this->authorize('create', UserGroup::class);

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
        $this->authorize('update', UserGroup::find($id));

        return view('groups.add', [
            'users' => \App\Models\User::all()->where('is_tutor', 0),
            'groupid' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', UserGroup::find($id));

        $group = UserGroup::find($id);

        $users = $request->input(['user-select']);
        $group->User()->attach([$users]);

        return redirect(route('groups.manage', $id));
    }

    public function delete($id)
    {
        $this->authorize('update', UserGroup::find($id));

        UserGroup::query()->where('groups.id', $id)->select('*')->delete();
        $group = new UserGroup();
        $group->User()->detach();
        return redirect('groups');
    }

    public function create()
    {
        $this->authorize('create', UserGroup::class);

        return view('groups.create', [
            'subjects' => Subject::all()
        ]);
    }

    public function edit($id)
    {
        $this->authorize('update', UserGroup::find($id));

        return view('groups.edit', [
            'group' => UserGroup::query()->find($id)
        ]);
    }

    public function updatename($id, Request $request)
    {
        $this->authorize('update', UserGroup::find($id));

        UserGroup::all()->find($id)->update(
            [
                'name' => $request->input('groupname'),
            ]
        );

        return redirect(route('groups.manage', $id));
    }

    public function discussion($id)
    {
        $this->authorize('viewAny', Discussion::class);

        return view('group.discussions', [
            'board' => Discussion::query()->where('discussions.group_id', $id)->orderByDesc('discussions.created_at')->paginate(),
            'id' => $id
        ]);
    }

    public function newdiscussion($id, Request $request)
    {
        $this->authorize('create', Discussion::class);

        Discussion::query()->create(
            [
                'title' => $request->input('title'),
                'body' => $request->input('description'),
                'user_id' => auth()->id(),
                'locked' => 0,
                'group_id' => $id //This is wrong, should be group id, this ID is the discussion id.
            ]
        )->save();

        return redirect(route('group.discussion', $id));
    }

    public function lock($id)
    {
        $this->authorize('update', Discussion::find($id));

        Discussion::query()->where('id', $id)->update(['locked' => 1]);

        return redirect(route('group.discussion', $id));
    }

    public function unlock($id)
    {
        $this->authorize('update', Discussion::find($id));

        Discussion::query()->where('id', $id)->update(['locked' => 0]);

        return redirect(route('group.discussion', $id));
    }

    public function deletediscussion($id)
    {
        $this->authorize('delete', Discussion::find($id));
        $this->authorize('delete', Reply::query()->where('discussion_id', $id)->id);

        Discussion::query()->where('id', $id)->delete();
        Reply::query()->where('discussion_id', $id)->delete();

        return redirect(route('dashboard'));
    }

    public function replies($id)
    {
        $this->authorize('viewAny', Reply::class);

        return view('group.chat', [
            'main' => Discussion::query()->where('discussions.id', $id)->orderByDesc('created_at')->firstOrFail(),
            'replies' => Reply::query()->where('replies.discussion_id', $id)->orderByDesc('created_at')->get()
        ]);
    }

    public function reply($id, Request $request)
    {
        $this->authorize('create', Reply::class);

        $d = Discussion::query()->where('discussions.id', $id)->get('id')->first()->id;

        Reply::query()->create(
            [
                'user_id' => auth()->id(),
                'message' => $request->input('message'),
                'group_id' => $id, // furthermore this is incorrect.
                'discussion_id' => $d
            ]
        )->save();

        return redirect(route('discussions.replies', $id));
    }
}
