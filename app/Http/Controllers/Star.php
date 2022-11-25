<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Star extends Controller
{
    public function starred()
    {
        return view('starred');
    }

    public function results()
    {
        return view('resourceresults', [
            'results' => \App\Models\Resource::search(request()->input('search'))->paginate(10)
        ]);
    }
}
