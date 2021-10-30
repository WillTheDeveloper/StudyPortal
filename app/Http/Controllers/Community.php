<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class Community extends Controller
{
    public function view()
    {
        return view('community', [
            'posts' => Post::all()->sortByDesc('created_at'),
            'users' => User::all()->take(3)
        ]);
    }

    public function profile($id)
    {
        return view('communityuser', [
            'user' => User::query()->where('users.id', $id)->findOrFail($id)
        ]);
    }

    public function post($id)
    {
        return view('communitypost', [
            'post' => Post::all()->where('posts.id', $id)
        ]);
    }

    public function popular()
    {

    }

    public function communites()
    {

    }

    public function trending()
    {

    }

    public function showSubject($id) {
        return view('communitysubject', [
            'posts' => Post::all()->where('subject_id', $id)
        ]);
    }
}
