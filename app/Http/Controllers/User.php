<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinInstitution;
use App\Http\Requests\UpdateProfileSettings;
use App\Models\Institution;
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
}
