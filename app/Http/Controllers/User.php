<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinInstitution;
use App\Http\Requests\UpdateProfileSettings;
use App\Models\Comment;
use App\Models\Institution;
use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Kanban;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination;
use Illuminate\Support\Facades\DB;
use Str;

class User extends Controller
{
    public function confirmDelete()
    {
        $this->authorize('delete', \App\Models\User::query()->find(auth()->id()));

        return view('dashboard.confirmdeleteaccount', [
            'name' => auth()->user()->name,
            'posts' => auth()->user()->Post()->count(),
            'comments' => auth()->user()->Comment()->count(),
        ]);
    }

    public function DeleteAccount()
    {
        $this->authorize('delete', \App\Models\User::query()->find(auth()->id()));

        $id = auth()->id();

        Comment::query()->where('user_id', $id)->delete();
        Post::query()->where('user_id', $id)->delete();
        DB::table('assignment_user')->where('user_id', $id)->delete();
        DB::table('subject_user')->where('user_id', $id)->delete();
        Kanban::query()->where('user_id', $id)->delete();
        KanbanGroup::query()->where('user_id', $id)->delete();
        KanbanItem::query()->where('user_id', $id)->delete();
        \App\Models\Note::query()->where('user_id', $id)->delete();
        DB::table('notifications')
            ->where('notifiable_type', '\App\Models\User')
            ->where('notifiable_id', $id)
            ->delete();

        \App\Models\User::query()->where('id', $id)->delete();

        return redirect(route('home'));
    }

    public function settings()
    {
        $this->authorize('update', \App\Models\User::query()->find(auth()->id()));

        return view('dashboard.settings');
    }

    public function updateSettings()
    {

    }

    public function showAll()
    {
        if (auth()->user()->is_admin) {
            return view('users.index', [
                'users' => \App\Models\User::query()->orderByDesc('created_at')->paginate(15),
            ]);
        }
        return abort(401);
    }

    public function updateprofile(UpdateProfileSettings $request)
    {
        auth()->user()->update(
            [
                'username' => Str::slug($request->input('username')),
                'bio' => $request->input('about'),
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]
        );
        auth()->user()->save();
        return redirect(route('profile'));
    }

    public function joinInstitution(JoinInstitution $joinInstitution)
    {
        $code = $joinInstitution->input('joincode');

        if (Institution::query()->where('joincode', $code)->exists()) {
            $id = Institution::query()->where('joincode', $code)->get('id')->first();

            $user = auth()->user();

            $user->Institution()->associate($id);

            $user->save();
        }

        return redirect(route(route('profile')));
    }

    public function manageUser($id)
    {
        return view('users.manage', [
            'user' => \App\Models\User::query()->where('users.id', $id)->find($id),
        ]);
    }

    public function updateUser($id, Request $request)
    {
//        dd($request->all());
        if ($request->input('moderator') == 'on') {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_moderator' => 1
                ]
            );
        }
        else
        {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_moderator' => 0
                ]
            );
        }
        if ($request->input('tutor') == 'on') {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_tutor' => 1
                ]
            );
        }
        else
        {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_tutor' => 0
                ]
            );
        }
        if ($request->input('admin') == 'on') {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_admin' => 1
                ]
            );
        }
        else
        {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_admin' => 0
                ]
            );
        }
        if ($request->input('banned') == 'on') {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_banned' => 1,
                    'is_admin' => 0,
                    'is_tutor' => 0,
                    'is_moderator' => 0
                ]
            );
        }
        else
        {
            \App\Models\User::query()->where('id', $id)->update(
                [
                    'is_banned' => 0
                ]
            );
        }
        return redirect(route('user.manage', $id));
    }
}
