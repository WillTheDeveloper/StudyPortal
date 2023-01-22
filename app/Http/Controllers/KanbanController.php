<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewKanbanBoard;
use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    public function list()
    {
        $this->authorize('viewAny', Kanban::class);

        return view('kanban.index',
        [
            'kanban' => Kanban::all()->where('user_id', auth()->id()),
        ]);
    }

    public function view($id)
    {
        $kanban = Kanban::find($id)->id;

        $this->authorize('view', Kanban::query()->findOrFail($kanban));
        $this->authorize('view', KanbanGroup::query()
            ->where('kanban_groups.kanban_id', $kanban)
            ->where('kanban_groups.user_id', auth()->id())
            ->get());

        return view('kanban.show',
        [
            'kanban' => Kanban::all()->where('id', $id)->find($id),
            'groups' => KanbanGroup::all()->where('kanban_id', $id),
            'items' => KanbanItem::all()->where('kanban_id', $id)
        ]);
    }

    public function renderCreate() //GET REQUEST
    {
        return view('kanban.new');
    }

    public function create(CreateNewKanbanBoard $request) //POST REQUEST
    {
        $request->validated();

        $kan = new Kanban(
            [
                'user_id' => $request->user()->id,
                'name' => $request->input('title'),
                'description' => $request->input('description')
            ]
        );

        $kan->save();

        return redirect(route('kanban.view', $kan->id));
    }

    public function update()
    {

    }

    public function delete($id)
    {
        KanbanItem::query()->where('kanban_items.kanban_id', $id)->delete();
        KanbanGroup::query()->where('kanban_groups.kanban_id', $id)->delete();
        Kanban::query()->where('kanbans.id', $id)->delete();

        return redirect(route('kanban.list'));
    }

    public function addItem($id, Request $request)
    {
        $item = new KanbanItem(
            [
                'item' => $request->input('item'),
                'kanban_id' => $id,
                'kanban_group_id' => $request->input('group-select'),
                'user_id' => $request->user()->id
            ]
        );

        $item->save();

        return redirect(route('kanban.view', $id));
    }

    public function addGroup($id, Request $request)
    {
        $group = new KanbanGroup(
            [
                'group' => $request->input('group'),
                'kanban_id' => $id,
                'user_id' => $request->user()->id
            ]
        );

        $group->save();

        return redirect(route('kanban.view', $id));
    }
}
