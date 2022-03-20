<?php

namespace App\Observers;

use App\Models\Assignment;
use App\Notifications\AssignmentCreated;
use App\Notifications\AssignmentUpdated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AssignmentObserver
{
    /**
     * Handle the Assignment "created" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function created(Assignment $assignment)
    {
//        $users = DB::table('assignment_user')->where('assignment_user.id', $assignment->getKey())->get('user_id')->toArray();
//
////        dd($users);
//
//        Notification::send($users, new AssignmentCreated($assignment));
    }

    /**
     * Handle the Assignment "updated" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function updated(Assignment $assignment)
    {
//        $users = $assignment->User()->id;
//
//        Notification::send($users, new AssignmentUpdated($assignment));
    }

    /**
     * Handle the Assignment "deleted" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function deleted(Assignment $assignment)
    {
        //
    }

    /**
     * Handle the Assignment "restored" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function restored(Assignment $assignment)
    {
        //
    }

    /**
     * Handle the Assignment "force deleted" event.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return void
     */
    public function forceDeleted(Assignment $assignment)
    {
        //
    }
}
