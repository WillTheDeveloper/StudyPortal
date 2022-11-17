<?php

namespace App\Policies;

use App\Models\KanbanItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KanbanItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanItem  $kanbanItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KanbanItem $kanbanItem)
    {
        return auth()->check() && auth()->id() == $kanbanItem->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->check() && !auth()->user()->is_banned;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanItem  $kanbanItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, KanbanItem $kanbanItem)
    {
        return auth()->check() && auth()->id() == $kanbanItem->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanItem  $kanbanItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, KanbanItem $kanbanItem)
    {
        return auth()->check() && auth()->id() == $kanbanItem->user_id && !auth()->user()->is_banned;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanItem  $kanbanItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, KanbanItem $kanbanItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanItem  $kanbanItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, KanbanItem $kanbanItem)
    {
        //
    }
}
