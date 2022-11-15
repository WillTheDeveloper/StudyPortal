<?php

namespace App\Policies;

use App\Models\Kanban;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KanbanPolicy
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
     * @param  \App\Models\Kanban  $kanban
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Kanban $kanban)
    {
        return auth()->check() && !auth()->user()->is_banned && $kanban->user_id == auth()->id();
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
     * @param  \App\Models\Kanban  $kanban
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Kanban $kanban)
    {
        return auth()->check() && !auth()->user()->is_banned && $kanban->user_id == auth()->id();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kanban  $kanban
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Kanban $kanban)
    {
        return auth()->check() && !auth()->user()->is_banned && $kanban->user_id == auth()->id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kanban  $kanban
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Kanban $kanban)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kanban  $kanban
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Kanban $kanban)
    {
        //
    }
}
