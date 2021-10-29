<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment as Assign;

class Assignment extends Controller
{
    public function manage($id)
    {
        return view('manageassignment', [
            'assignment' => Assign::all()->where('id', $id)->find($id)
        ]);
    }
}
