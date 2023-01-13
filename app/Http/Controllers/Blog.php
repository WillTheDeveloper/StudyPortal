<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Str;

class Blog extends Controller
{
    public function all(Request $request)
    {
        return view('blog.index', [
            'articles' => \App\Models\Blog::query()
                ->where('blogs.visible', 1)
                ->when($request->query('type'), function ($query, $type) {
                    $query->where('content_type', $type);
                })
                ->orderByDesc('created_at')
                ->paginate(6),
        ]);
    }

    public function show($slug)
    {
        return view('blog.show', [
            'content' => \App\Models\Blog::query()
                ->where('blogs.slug', $slug)
                ->where('blogs.visible', 1)
                ->firstOrFail()
        ]);
    }

    public function make()
    {
        return view('blog.create');
    }

    public function postit(Request $request)
    {
        $slug = Str::slug($request->input('slug'));

        $v = $request->input('visible');
        $r = $request->input('responses');

        if($v == !null){
            $x = 1;
        }
        else {
            $x = 0;
        }

        if ($r == !null) {
            $y = 1;
        }
        else {
            $y = 0;
        }

//        dd($request->all());


        \App\Models\Blog::query()->create(
            [
                'title' => $request->input('title'),
                'body' => $request->input('content'),
                'slug' => $slug,
                'content_type' => $request->input('type'),
                'url' => 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
                'visible' => $x,
                'replies' => $y,
                'user_id' => auth()->id()
            ]
        )->save();

        return redirect(route('blog.show', $slug));
    }

    public function hidden() //GET
    {
        return view('blog.hidden', [
            'articles' => \App\Models\Blog::query()
                ->where('blogs.visible', 0)
                ->orderByDesc('blogs.created_at')
                ->paginate(6)
        ]);
    }

    public function makeVisible($slug) //POST
    {
        \App\Models\Blog::query()
            ->where('blogs.slug', $slug)
            ->where('blogs.visible', 0)
            ->select('visible')
            ->update(
                [
                    'visible' => 1
                ]
            );
        return redirect(route('blog.show', $slug));
    }

    public function makeHidden($slug) //POST
    {
        \App\Models\Blog::query()
            ->where('blogs.slug', $slug)
            ->where('blogs.visible', 1)
            ->select('visible')
            ->update(
                [
                    'visible' => 0
                ]
            );
        return redirect(route('blog.hidden'));
    }

    public function enableReplies($slug) //POST
    {
        \App\Models\Blog::query()
            ->where('blogs.slug', $slug)
            ->where('blogs.replies', 0)
            ->select('replies')
            ->update(
                [
                    'replies' => 1
                ]
            );
        return redirect(route('blog.hidden'));
    }

    public function disableReplies($slug) //POST
    {
        \App\Models\Blog::query()
            ->where('blogs.slug', $slug)
            ->where('blogs.replies', 1)
            ->select('replies')
            ->update(
                [
                    'replies' => 0
                ]
            );
        return redirect(route('blog.hidden'));
    }

    public function response($slug, Request $request) // POST REQUEST
    {
        $id = \App\Models\Blog::query()
            ->where('slug', $slug)
            ->first()->id;

        Response::query()
            ->create(
                [
                    'user_id' => auth()->id(),
                    'blog_id' => $id,
                    'response' => $request->input('comment')
                ]
            );

        return redirect(route('blog.show', $slug));
    }
}
