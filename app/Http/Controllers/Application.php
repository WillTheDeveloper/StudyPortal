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

    public function allapplications($slug)
    {
        $id = \App\Models\Placement::query()->firstWhere('slug', $slug)->id;

        return view('allapplications', [
            'applicants' => \App\Models\Application::query()
                ->where('placement_id', $id)
                ->where('status', 'pending')
                ->paginate(10),
            'placement' => \App\Models\Placement::query()->firstWhere('slug', $slug)
        ]);
    }

    public function review($slug)
    {
        return view('reviewapplication', [
            'application' => \App\Models\Application::query()
                ->firstWhere('slug', $slug)
        ]);
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
