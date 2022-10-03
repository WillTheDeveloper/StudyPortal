<?php

namespace App\Policies;

use App\Models\Response;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResponsePolicy
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
        return auth()->check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Response $response)
    {
        return auth()->check() && $response->Blog->replies == true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->check() && $user->hasVerifiedEmail() && !$user->is_banned;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Response $response)
    {
        return auth()->check() &&
            $user->hasVerifiedEmail() &&
            $user->id == $response->user_id &&
            !$user->is_banned &&
            $response->Blog->replies == true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Response $response)
    {
        return auth()->check() &&
            $user->hasVerifiedEmail() &&
            $user->id == $response->user_id &&
            !$user->is_banned &&
            $response->Blog->replies == true or
            $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Response $response)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Response $response)
    {
        //
    }
}
