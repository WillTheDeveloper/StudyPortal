<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Institution extends Controller
{
    public function view()
    {
        return view('institutions',
        [
            'all' => \App\Models\Institution::query()->orderByDesc('institutions.institution')->paginate(25),
        ]);
    }

    public function manage($joincode)
    {
        return view('institutionmanage', [
            'institution' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function create()
    {
        return view('institutionnew');
    }

    public function update($joincode, Request $request)
    {
        $new = $request->input('joincode');

        $n = \App\Models\Institution::query()->where('joincode', $joincode)
            ->update([
                'institution' => $request->input('institution'),
                'joincode' => $new
            ]);

        return redirect(route('institution.manage'));
    }

    public function users($joincode)
    {
        return view('institutionusers', [
            'users' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function addUser($joincode)
    {
        return view('institutionadduser');
    }
}
