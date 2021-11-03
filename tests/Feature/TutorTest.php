<?php

namespace Tests\Feature;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Sodium\increment;

class TutorTest extends TestCase
{
//  This is a test to see if Tutors can see there pages and do what they need to do. Link to assignment tests?

    public function test_tutor_can_see_dashboard()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/dashboard');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_timetable()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/timetable');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_assignments()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/assignments');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_groups()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/groups');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_community()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/community');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_profile()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/profile');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_subscribe()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/subscribe');
        $view->assertStatus(200);
    }

    public function test_tutor_cant_see_users()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/users');
        $view->assertUnauthorized();
    }

    public function test_tutor_can_view_create_group()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/groups/create');
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_their_profile()
    {
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/community/'.$user->id);
        $view->assertStatus(200);
    }
}
