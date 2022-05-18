<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class Blog extends Controller
{
    public function all(Request $request)
    {
        return view('blog', [
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
        return view('blogread', [
            'content' => \App\Models\Blog::query()
                ->where('blogs.slug', $slug)
                ->where('blogs.visible', 1)
                ->firstOrFail()
        ]);
    }

    public function make()
    {
        return view('blogcreate');
    }

    public function postit(Request $request)
    {
        $slug = Str::slug($request->input('slug'));

        $v = $request->input('visible');
        $r = $request->input('responses');

        if($v = !null){
            $x = 1;
        }
        else {
            $x = 0;
        }

        if ($r = !null) {
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
}
