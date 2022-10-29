<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Placement extends Controller
{
    public function view()
    {
        return view('placements', [
            'placements' => \App\Models\Placement::query()
                ->where('active', true)
                ->groupBy(['open', 'id'])
                ->paginate(15),
            'applications' => \App\Models\Application::query()
                ->where('user_id', auth()->id())
                ->inRandomOrder()
                ->limit(2)->get(),
        ]);
    }

    public function slug($slug)
    {
        return view('placement', [
            'placement' => \App\Models\Placement::query()->firstWhere('slug', $slug),
            'check' => \App\Models\Application::query()
                ->where('user_id', auth()->id())
                ->where('placement_id', \App\Models\Placement::query()->firstWhere('slug', $slug)->id)
                ->exists(),
            'application' => \App\Models\Application::query()
                ->where('user_id', auth()->id())
                ->where('placement_id', \App\Models\Placement::query()
                    ->firstWhere('slug', $slug)
                    ->id)
                ->get(),
        ]);
    }

    public function create(Request $request)
    {
        $pm = \App\Models\Placement::query()->create([
            'user_id' => $request->user()->id,
            'location' => $request->input('location'),
            'company' => $request->input('company'),
            'role' => $request->input('role'),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')-$request->input('company')),
            'closing' => $request->date('closing')
        ]);

        return redirect(route('placement.slug', $pm->slug));
    }

    public function new()
    {
        return view('newplacement');
    }
}
