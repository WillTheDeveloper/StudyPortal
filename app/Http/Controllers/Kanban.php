<?php

namespace App\Http\Controllers;

use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Kanban;
use Illuminate\Http\Request;

class Kanban extends Controller
{
    public function list()
    {
        return view('kanban',
        [
            'kanban' => Kanban::all()->where('id', auth()->user()->id),
        ]);
    }

    public function view($id)
    {
        return view('viewkanban',
        [
            'kanban' => Kanban::all()->where('id', $id),
            'groups' => KanbanGroup::all()->where('kanban_id', $id),
            'items' => KanbanItem::all()->where('kanban_id', $id)
        ]);
    }
}
