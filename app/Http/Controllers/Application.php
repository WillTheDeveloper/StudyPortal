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

    public function apply($slug)
    {
        return view('application', [
            'slug' => $slug
        ]);
    }

    public function submit(Request $request, $slug)
    {
//        dd($slug, $request);

        \App\Models\Application::query()->create([
            'cv' => $request->input('cv'),
            'user_id' => auth()->id(),
            'placement_id' => \App\Models\Placement::query()->firstWhere('slug', $slug)->id,
            'status' => 'pending'
        ]);

        return redirect(route('applications'));
    }

    public function redact($id)
    {
        \App\Models\Application::query()
            ->find($id)
            ->update([
                'status' => 'redacted'
            ]);

        return redirect(route('applications'));
    }

    public function id($id)
    {
        return view('application', [
            'application' => \App\Models\Application::query()->findOrFail($id)
        ]);
    }
}
