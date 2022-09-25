<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'completed' => Task::query()->where('user_id', auth()->id())->where('complete', true)->paginate(20)
        ]);
    }

    public function archived()
    {
        return view('todoarchived', [
            'archived' => Task::onlyTrashed()->where('user_id', auth()->id())->paginate(20)
        ]);
    }

    public function markAsComplete($id)
    {
        Task::withTrashed()->find($id)->update([
            'complete' => true
        ]);

        Session::flash('status', 'completed');

        return redirect(route('todo.all'));
    }

    public function markAsDue($id)
    {
        Task::withTrashed()->find($id)->update([
            'complete' => false
        ]);

        Session::flash('status', 'uncompleted');

        return redirect(route('todo.all'));
    }

    public function restore($id)
    {
        Task::withTrashed()->find($id)->restore();
        Task::withoutTrashed()->find($id)->update([
            'complete' => false
        ]);

        Session::flash('status', 'restored');

        return redirect(route('todo.all'));
    }

    public function archive($id) // Essentially is deleting but uses soft deletes therefore goes to archive.
    {
        Task::withoutTrashed()->find($id)->delete();

        Session::flash('status', 'archived');

        return redirect(route('todo.all'));
    }

    public function deletearchive($id) // This actually deletes it from the database.
    {
        Task::onlyTrashed()->find($id)->forceDelete();

        Session::flash('status', 'deleted');

        return redirect(route('todo.all'));
    }
}
