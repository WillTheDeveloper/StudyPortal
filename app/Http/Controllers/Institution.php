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
}
