<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Placement extends Controller
{
    public function view()
    {
        return view('placements', [
            'placements' => \App\Models\Placement::query()->get()
        ]);
    }
}
