<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application as App;

class Application extends Controller
{
    public function all()
    {
        $this->authorize('viewAny', App::class);

        return view('placement.applications', [
            'applications' => \App\Models\Application::query()
                ->where('user_id', auth()->id())
                ->paginate(10)
        ]);
    }

    public function apply($slug)
    {
        $this->authorize('create', App::class);

        return view('application', [
            'slug' => $slug
        ]);
    }

    public function submit(Request $request, $slug)
    {
        $this->authorize('create', App::class);

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
        $this->authorize('view', App::query()->firstWhere('slug', $slug));

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
        $this->authorize('view', App::query()->firstWhere('slug', $slug));

        return view('reviewapplication', [
            'application' => \App\Models\Application::query()
                ->firstWhere('slug', $slug)
        ]);
    }

    public function redact($id)
    {
        $this->authorize('update', App::query()->findOrFail($id));

        \App\Models\Application::query()
            ->find($id)
            ->update([
                'status' => 'redacted'
            ]);

        return redirect(route('applications'));
    }

    public function id($id)
    {
        return view('managemyapplication', [
            'application' => \App\Models\Application::query()->findOrFail($id)
        ]);
    }
}
