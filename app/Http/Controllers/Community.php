<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewComment;
use App\Http\Requests\CreateNewPost;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination;

class Community extends Controller
{
    public function view()
    {
        return view('community', [
            'posts' => Post::query()->orderByDesc('created_at')->paginate(10),
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
        return view('communities', [
            'data' => Subject::all()
        ]);
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

    public function createNewPost(CreateNewPost $request)
    {
        $request->validated();

        $post = new Post(
            [
                'title' => $request->input('title'),
                'body' => $request->input('text'),
                'user_id' => $request->user()->id,
                'subject_id' => $request->input('subject'),
            ]
        );

        $post->save();

        Http::post('https://discord.com/api/webhooks/914187384835420211/aUjMOW2HNugOC163Rf3ziggluhvTtzROxAoku9AWR258sGTf6Ec6u2DaOKTzx-G6hhTC', [
            'content' => "New post!",
            'embeds' => [
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('text'),
                    'color' => '7506394',
                    'url' => route('community.post', $post->id),
                ]
            ],
        ]);

        return redirect(route('community.post', $post->id));
    }

    public function deletePost($id)
    {
        $post = Post::all()->find($id);
        $post->delete();
        $comments = Comment::all()->where('post_id', $id)->find($id);
        $comments->delete();

        return redirect(route('community'));
    }

    public function createNewComment($id, CreateNewComment $request)
    {
        $request->validated();

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

    public function joinSubject($id) //POST REQUEST
    {
        $subject = Subject::find($id);

        $subject->User()->attach(auth()->id());

        return redirect(route('community.subject', $id));
    }

    public function leaveSubject($id) //POST REQUEST
    {
        $subject = Subject::find($id);

        $subject->User()->detach(auth()->id());

        return redirect(route('community'));
    }
}
