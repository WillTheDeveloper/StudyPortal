<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Group extends Controller
{
    public function returnView($id)
    {
        return view('managegroups', [
            'groupstuff' => \App\Models\Group::all()->where('id', $id)->find($id)
        ]);
    }
}
