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
}
