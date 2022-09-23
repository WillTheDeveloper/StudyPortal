<?php

namespace App\Mail;

use App\Models\Assignment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignmentDeleted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(Assignment $assignment)
    {
        $this->data = $assignment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.assignment.deleted');
    }
}
