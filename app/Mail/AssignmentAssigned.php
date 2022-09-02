<?php

namespace App\Mail;

use App\Models\Assignment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignmentAssigned extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $data;
    public $user;

    public function __construct(Assignment $assignment)
    {
        $this->data = $assignment;
        $this->user = $assignment->User;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.assignment.assigned');
    }
}
