<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Community extends Controller
{
    public function view()
    {
        return view('community', ['posts' => Post::all()->sortByDesc('created_at')]);
    }
}
