<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment as Assign;
use Illuminate\Support\Facades\DB;

class Assignment extends Controller
{
    public function manage($id)
    {
        return view('manageassignment', [
            'assignment' => Assign::all()->where('id', $id)->find($id)
        ]);
    }

    public function delete($id, Request $request)
    {
        if ($request->user()->is_tutor) {
            Assign::query()->where('assignments.id', $id)->findOrFail($id)->delete();
            DB::table('assignment_user')->where('assignment_user.assignment_id', $id)->select('*')->delete();
        }
        return redirect('assignments');
    }
}
