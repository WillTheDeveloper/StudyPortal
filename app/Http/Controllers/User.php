<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinInstitution;
use App\Http\Requests\UpdateProfileSettings;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Pagination;

class User extends Controller
{
    public function confirmDelete()
    {
        return view('confirmdeleteaccount', [
            'name' => auth()->id(),
            'posts' => auth()->user()->Post()->count(),
            'comments' => auth()->user()->Comment()->count()
        ]);
    }

    public function DeleteAccount()
    {

    }

    public function showAll()
    {
        if (auth()->user()->is_admin) {
            return view('users', [
                'users' => \App\Models\User::query()->orderByDesc('created_at')->paginate(15),
            ]);
        }
        return abort(401);
    }

    public function updateprofile(UpdateProfileSettings $request)
    {
        auth()->user()->update(
            [
                'username' => $request->input('username'),
                'bio' => $request->input('about'),
            ]
        );
        auth()->user()->save();
        return redirect('profile');
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

        return redirect(route('profile'));
    }

    public function manageUser($id)
    {
        return view('manageuser', [
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
