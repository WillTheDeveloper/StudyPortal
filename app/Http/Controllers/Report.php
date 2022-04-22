<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report extends Controller
{
    public function overview()
    {
        return view('reports', [
            'reports' => \App\Models\Report::query()->orderByDesc('created_at')->paginate(10),
            'stats' => \App\Models\Report::query(),
        ]);
    }

    public function resolved()
    {

    }

    public function unresolved()
    {

    }
}
