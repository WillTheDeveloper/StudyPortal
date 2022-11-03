<?php

namespace Tests\Feature;

use App\Mail\AssignmentAssigned;
use App\Mail\AssignmentDeleted;
use App\Mail\AssignmentUpdated;
use App\Models\Assignment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase //🦆
{
    public function test_assignment_assigned_mail()
    {
        $assignment = Assignment::factory()->create();
        $this->assertModelExists($assignment);
        $mail = new AssignmentAssigned($assignment);
        $mail->assertSeeInHtml($assignment->title);
    }

    public function disabled_test_assignment_updated_mail()
    {
        $assignment = Assignment::factory()->create();
        $this->assertModelExists($assignment);
        $mail = new AssignmentUpdated($assignment);
        $mail->assertSeeInHtml($assignment->title);
    } //TODO: Finish the view associated with this mailable

    public function test_assignment_deleted_mail()
    {
        $assignment = Assignment::factory()->create();
        $this->assertModelExists($assignment);
        $mail = new AssignmentDeleted($assignment);
        $mail->assertSeeInHtml($assignment->title);
    }
}
