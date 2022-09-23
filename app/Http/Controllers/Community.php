<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewComment;
use App\Http\Requests\CreateNewPost;
use App\Http\Requests\UpdateUserComment;
use App\Http\Requests\UpdateUserPost;
use App\Jobs\SendPostWebhook;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination;
use Illuminate\Support\Str;

class Community extends Controller
{
    public function search(Request $request)
    {
        return view('communitysearch', [
            'results' => Post::search($request->input('search'))->paginate(10)
        ]);
    }

    public function like($slug)
    {
        $id = Post::query()->where('slug', $slug)->first()->id;

        Like::query()->firstOrCreate(
            [
                'post_id' => $id,
                'user_id' => auth()->id()
            ]
        )->save();
        return redirect('community');
    }

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
            'user' => User::query()->where('users.id', $id)->findOrFail($id),
            'posts' => Post::query()->where('posts.user_id', $id)->orderByDesc('created_at')->limit(5)->get(),
            'comments' => Comment::query()->where('comments.user_id', $id)->orderByDesc('created_at')->limit(5)->get(),
        ]);
    }

    public function post($slug)
    {
        Post::query()->where('posts.slug', $slug)->increment('views', '1');

        return view('communitypost', [
            'post' => Post::query()->where('posts.slug', $slug)->firstOrFail(),
        ]);
    }

    public function popular()
    {
        return view('popular');
    }

    public function communities()
    {
        return view('communities', [
            'data' => Subject::query()->orderByDesc('created_at')->paginate(10)
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
                'slug' => Str::slug($request->input('title'))
            ]
        );

        $post->save();

        return redirect(route('community.post', $post->id));
    }

    public function deletePost($id)
    {
        $post = Post::all()->find($id);
        $post->delete();
        $comments = Comment::query()->where('post_id', $id)->delete();

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

    public function updatePost($slug, UpdateUserPost $request)
    {
        $post = Post::query()->where('posts.slug', $slug);

        $title = $request->input('title');
        $body = $request->input('body');
        $slug = Str::slug($request->input('title'));

        $post->update(
            [
                'title' => $title,
                'body' => $body,
                'slug' => $slug
            ]
        );

        return redirect(route('community'));
    }

    public function updateComment($id, UpdateUserComment $request)
    {
        $comment = Comment::query()->where('comments.id', $id);

        $comment->update(
            [
                'comment' => $request->input('comment')
            ]
        );

        return back();
    }

    public function deleteComment($id)
    {
        $comment = Comment::query()->where('comments.id', $id);

        $comment->delete();

        return back();
    }

    public function updatePrivacy(Request $request, $id)
    {
        $bio = $request->input('bio');
        $privacy = $request->input('privacy');
        $contact = $request->input('contact');

//        dd([$bio, $privacy, $contact]);

        User::query()->findOrFail($id)
            ->update(
                [
                    'bio' => $bio,
                    'private' => $privacy,
                    'contact' => $contact,
                ]
            );

        return redirect(route('community.profile', $id));
    }
}
