<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileSettings;
use Illuminate\Http\Request;

class User extends Controller
{
    public function showAll()
    {
        if (auth()->user()->is_admin) {
            return view('users', [
                'users' => \App\Models\User::all()->sortByDesc('name')
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
}
