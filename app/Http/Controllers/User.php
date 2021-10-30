<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\WithPagination;

class User extends Controller
{
    use WithPagination;

    public function showAll()
    {
        if (auth()->user()->is_admin) {
            return view('users', [
                'users' => \App\Models\User::all()->sortByDesc('name')
            ]);
        }
    }

    public function updateprofile(Request $request)
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
