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
                ->paginate(15)
        ]);
    }

    public function slug($slug)
    {
        return view('placement', [
            'placement' => \App\Models\Placement::query()->firstWhere('slug', $slug)
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

    }
}
