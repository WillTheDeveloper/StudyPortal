<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog extends Controller
{
    public function all()
    {
        return view('blog', [
            'articles' => \App\Models\Blog::query()
                ->where('blogs.visible', 1)
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

    public function postit()
    {

    }
}
