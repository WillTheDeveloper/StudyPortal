<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StarController extends Controller
{
    public function starred()
    {
        return view('resources.starred', [
            'starred' => Star::query()->where('user_id', auth()->id())->paginate(10)
        ]);
    }

    public function results()
    {
        return view('resources.results', [
            'results' => Resource::search(request()->input('search'))->paginate(10)
        ]);
    }

    public function star($id)
    {
        Star::query()->firstOrCreate([
            'user_id' => auth()->id(),
            'resource_id' => $id
        ]);

        Session::flash('starred');

        return back();
    }
}
