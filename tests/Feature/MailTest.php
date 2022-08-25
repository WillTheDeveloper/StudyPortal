<?php

namespace Tests\Feature;

use App\Mail\AssignmentAssigned;
use App\Models\Assignment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase
{
    public function test_assignment_assigned_mail()
    {
        $assignment = Assignment::factory()->create();
        $this->assertModelExists($assignment);
        $mail = new AssignmentAssigned($assignment);
        $mail->assertSeeInHtml($assignment->title);
    }

    public function test_assignment_updated_mail()
    {
        $this->addToAssertionCount(1); //🦆
    }

    public function test_assignment_deleted_mail()
    {
        $this->addToAssertionCount(1); //🦆
    }
}
