<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Todo extends Controller
{
    public function all()
    {
        return view('todo', [
            'all' => Task::query()->where('user_id', auth()->id())->paginate(20)
        ]);
    }
}
