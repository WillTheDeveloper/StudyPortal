<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
//  Test if admins can do what they need to do.
    public function test_admin_can_see_users()
    {
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('users'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_reports()
    {
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('reports.overview'));
        $view->assertStatus(200);
        $view->assertSeeText("Recent reports");
    }

    public function test_admin_can_see_unresolved_reports()
    {
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('reports.unresolved'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_resolved_reports()
    {
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('reports.resolved'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_list_of_reports()
    {
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $post = Post::factory()->create();
        $report = Report::factory()->create(
            [
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]
        );
        $view = $this->get(route('reports.overview'));
        $view->assertStatus(200);
        $view->assertSeeText($report->reason);
    }
}
