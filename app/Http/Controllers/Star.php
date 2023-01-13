<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Star extends Controller
{
    public function starred()
    {
        return view('resources.starred', [
            'starred' => \App\Models\Star::query()->where('user_id', auth()->id())->paginate(10)
        ]);
    }

    public function results()
    {
        return view('resources.results', [
            'results' => \App\Models\Resource::search(request()->input('search'))->paginate(10)
        ]);
    }

    public function star($id)
    {
        \App\Models\Star::query()->firstOrCreate([
            'user_id' => auth()->id(),
            'resource_id' => $id
        ]);

        Session::flash('starred');

        return back();
    }
}
