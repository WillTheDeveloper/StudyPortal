<?php

namespace App\Policies;

use App\Models\KanbanGroup;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KanbanGroupPolicy
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
        return auth()->check() && !auth()->user()->is_banned;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanGroup  $kanbanGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KanbanGroup $kanbanGroup)
    {
        return auth()->check() && auth()->user()->id == $kanbanGroup->user_id;
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
     * @param  \App\Models\KanbanGroup  $kanbanGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, KanbanGroup $kanbanGroup)
    {
        return auth()->check() && !auth()->user()->is_banned && auth()->id() == $kanbanGroup->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanGroup  $kanbanGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, KanbanGroup $kanbanGroup)
    {
        return auth()->check() && !auth()->user()->is_banned && auth()->id() == $kanbanGroup->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanGroup  $kanbanGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, KanbanGroup $kanbanGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KanbanGroup  $kanbanGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, KanbanGroup $kanbanGroup)
    {
        //
    }
}
