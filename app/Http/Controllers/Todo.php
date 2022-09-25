<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Todo extends Controller
{
    public function active()
    {
        return view('todo', [
            'all' => Task::query()->where('user_id', auth()->id())->where('complete', false)->paginate(20)
        ]);
    }

    public function completed()
    {
        return view('todocompleted', [
            'completed' => Task::query()->where('user_id', auth()->id())->where('complete', false)->paginate(20)
        ]);
    }

    public function archived()
    {
        return view('todoarchived', [
            'archived' => Task::query()->where('user_id', auth()->id())->paginate(20)
        ]);
    }
}
