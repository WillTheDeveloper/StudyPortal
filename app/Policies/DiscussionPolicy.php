<?php

namespace App\Policies;

use App\Models\Discussion;
use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
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
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Discussion $discussion)
    {
        return $user->has(Group::find($discussion->Group()->id))->exists() &&
            !$user->is_banned &&
            auth()->check() or
            $user->is_admin or $user->is_moderator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->is_tutor &&
            $user->hasVerifiedEmail() &&
            !$user->is_banned;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Discussion $discussion)
    {
        return $user->id == $discussion->user_id && $user->is_tutor or $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Discussion $discussion)
    {
        return $user->id == $discussion->user_id && $user->is_tutor or $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Discussion $discussion)
    {
        //
    }
}
