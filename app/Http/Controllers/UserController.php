<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinInstitution;
use App\Http\Requests\UpdateProfileSettings;
use App\Models\Comment;
use App\Models\Institution;
use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Kanban;
use App\Models\Note;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function confirmDelete()
    {
        $user = User::query()->find(auth()->id());
        $this->authorize('delete', $user);
        return view('dashboard.confirmdeleteaccount', [
            'name' => $user->name,
            'posts' => $user->Post()->count(),
            'comments' => $user->Comment()->count(),
        ]);
    }

    public function DeleteAccount()
    {
        $this->authorize('delete', User::query()->find(auth()->id()));

        $id = auth()->id();

        Comment::query()->where('user_id', $id)->delete();
        Post::query()->where('user_id', $id)->delete();
        DB::table('assignment_user')->where('user_id', $id)->delete();
        DB::table('subject_user')->where('user_id', $id)->delete();
        Kanban::query()->where('user_id', $id)->delete();
        KanbanGroup::query()->where('user_id', $id)->delete();
        KanbanItem::query()->where('user_id', $id)->delete();
        Note::query()->where('user_id', $id)->delete();
        DB::table('notifications')
            ->where('notifiable_type', '\App\Models\User')
            ->where('notifiable_id', $id)
            ->delete();

        User::query()->where('id', $id)->delete();

        return redirect(route('home'));
    }

    public function settings()
    {
        $this->authorize('update', User::query()->find(auth()->id()));

        return view('dashboard.settings');
    }

    public function updateSettings()
    {
    }

    public function showAll()
    {
        if (auth()->user()->is_admin) {
            return view('users.index', [
                'users' => User::query()->orderByDesc('created_at')->paginate(15),
            ]);
        }
        return abort(401);
    }

    public function updateprofile(UpdateProfileSettings $request)
    {
        $user = User::find(auth()->user()->id);
        $user->username = Str::slug($request->input('username'));
        $user->bio = $request->input('about');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect(route('profile'));
    }

    public function joinInstitution(JoinInstitution $joinInstitution)
    {
        $code = $joinInstitution->input('joincode');

        if (Institution::query()->where('joincode', $code)->exists()) {
            $id = Institution::query()->where('joincode', $code)->get('id')->first();

            $user = User::find(auth()->user()->id);
            $user->Institution()->associate($id);
            $user->save();
        }

        return redirect(route(route('profile')));
    }

    public function manageUser($id)
    {
        return view('users.manage', [
            'user' => User::query()->where('users.id', $id)->find($id),
        ]);
    }

    public function updateUser($id, Request $request)
    {
        //        dd($request->all());
        if ($request->input('moderator') == 'on') {
            User::query()->where('id', $id)->update(
                [
                    'is_moderator' => 1
                ]
            );
        } else {
            User::query()->where('id', $id)->update(
                [
                    'is_moderator' => 0
                ]
            );
        }
        if ($request->input('tutor') == 'on') {
            User::query()->where('id', $id)->update(
                [
                    'is_tutor' => 1
                ]
            );
        } else {
            User::query()->where('id', $id)->update(
                [
                    'is_tutor' => 0
                ]
            );
        }
        if ($request->input('admin') == 'on') {
            User::query()->where('id', $id)->update(
                [
                    'is_admin' => 1
                ]
            );
        } else {
            User::query()->where('id', $id)->update(
                [
                    'is_admin' => 0
                ]
            );
        }
        if ($request->input('banned') == 'on') {
            User::query()->where('id', $id)->update(
                [
                    'is_banned' => 1,
                    'is_admin' => 0,
                    'is_tutor' => 0,
                    'is_moderator' => 0
                ]
            );
        } else {
            User::query()->where('id', $id)->update(
                [
                    'is_banned' => 0
                ]
            );
        }
        return redirect(route('user.manage', $id));
    }
}
