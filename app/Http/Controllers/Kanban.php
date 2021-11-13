<?php

namespace App\Http\Controllers;

use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Kanban as Kan;
use Illuminate\Http\Request;

class Kanban extends Controller
{
    public function list()
    {
        return view('kanban',
        [
            'kanban' => Kan::all()->where('id', auth()->user()->id),
        ]);
    }

    public function view($id)
    {
        return view('viewkanban',
        [
            'kanban' => Kan::all()->where('id', $id)->find($id),
            'groups' => KanbanGroup::all()->where('kanban_id', $id),
            'items' => KanbanItem::all()->where('kanban_id', $id)
        ]);
    }

    public function delete($id)
    {
        KanbanItem::query()->where('kanban_items.kanban_id', $id)->delete();
        KanbanGroup::query()->where('kanban_groups.kanban_id', $id)->delete();
        Kan::query()->where('kanbans.id', $id)->delete();

        return redirect(route('kanban.list'));
    }
}
