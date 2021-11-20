<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        Post::query()->where('posts.id', $id)->increment('views', '1');

        return view('communitypost', [
            'post' => Post::query()->where('posts.id', $id)->find($id),
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

    public function deletePost($id, Request $request)
    {
        $user = Post::all()->find($id)->get('posts.user_id');
        if ($request->user()->id = $user) {
            $post = Post::all()->find($id);
            $post->delete();

            return redirect(route('community'));
        }
        return abort(403);
    }

    public function createNewComment($id, Request $request)
    {
        $comment = new Comment(
            [
                'comment' => $request->input('comment'),
                'user_id' => auth()->user()->id,
                'post_id' => $id
            ]
        );

        $comment->save();

        return redirect()->back();
    }
}
