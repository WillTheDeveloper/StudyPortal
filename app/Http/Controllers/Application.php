<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Application extends Controller
{
    public function all()
    {
        return view('myapplications', [
            'applications' => \App\Models\Application::query()
                ->where('user_id', auth()->id())
                ->paginate(10)
        ]);
    }

    public function id($id)
    {
        return view('application', [
            'application' => \App\Models\Application::query()->firstOrFail($id)
        ]);
    }
}
