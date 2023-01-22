<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Placement;

class ApplicationController extends Controller
{
    public function all()
    {
        $this->authorize('viewAny', Application::class);

        return view('placement.applications', [
            'applications' => Application::query()
                ->where('user_id', auth()->id())
                ->paginate(10)
        ]);
    }

    public function apply($slug)
    {
        $this->authorize('create', Application::class);

        return view('application', [
            'slug' => $slug
        ]);
    }

    public function submit(Request $request, $slug)
    {
        $this->authorize('create', Application::class);

        Application::query()->create([
            'cv' => $request->input('cv'),
            'user_id' => auth()->id(),
            'placement_id' => Placement::query()->firstWhere('slug', $slug)->id,
            'status' => 'pending'
        ]);

        return redirect(route('applications'));
    }

    public function allapplications($slug)
    {
        $this->authorize('view', Application::query()->firstWhere('slug', $slug));

        $id = Placement::query()->firstWhere('slug', $slug)->id;

        return view('allapplications', [
            'applicants' => Application::query()
                ->where('placement_id', $id)
                ->where('status', 'pending')
                ->paginate(10),
            'placement' => Placement::query()->firstWhere('slug', $slug)
        ]);
    }

    public function review($slug)
    {
        $this->authorize('view', Application::query()->firstWhere('slug', $slug));

        return view('reviewapplication', [
            'application' => Application::query()
                ->firstWhere('slug', $slug)
        ]);
    }

    public function redact($id)
    {
        $this->authorize('update', Application::query()->findOrFail($id));

        Application::query()
            ->find($id)
            ->update([
                'status' => 'redacted'
            ]);

        return redirect(route('applications'));
    }

    public function id($id)
    {
        return view('applications.manage', [
            'application' => Application::query()->findOrFail($id)
        ]);
    }
}
