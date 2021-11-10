<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('popular');
    }

    public function communities()
    {
        return view('communities');
    }

    public function trending()
    {
        return view('trending');
    }

    public function showSubject($id) {
        return view('communitysubject', [
            'posts' => Post::all()->where('subject_id', $id)
        ]);
    }

    public function createNewPost(Request $request)
    {
        $post = new Post(
            [
                'title' => $request->input('title'),
                'body' => $request->input('text'),
                'user_id' => $request->user()->id,
                'subject_id' => $request->input('subject'),
            ]
        );

        $post->save();

        return redirect(route('community.post', $post->id));
    }
}
