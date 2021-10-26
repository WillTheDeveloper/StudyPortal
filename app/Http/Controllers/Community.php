<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class Community extends Controller
{
    public function view()
    {
        return view('community', ['posts' => Post::all()->sortByDesc('created_at')]);
    }

    public function profile($id)
    {
        return view('communityuser', ['user' => User::query()->where('users.id', $id)->findOrFail($id)]);
    }
}
