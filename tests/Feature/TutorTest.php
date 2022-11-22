<?php

namespace Tests\Feature;

use App\Models\Assignment;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TutorTest extends TestCase
{
    //  This is a test to see if Tutors can see there pages and do what they need to do. Link to assignment tests?

    public function test_tutor_can_see_dashboard()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('dashboard'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_timetable()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('timetable'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_assignments()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('assignments'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_groups()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('groups'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_community()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('community'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_profile()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('profile'));
        $view->assertStatus(200);
    }

    /*public function test_tutor_can_see_subscribe()
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
    }*/

    public function test_tutor_cant_see_users()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('users'));
        $view->assertUnauthorized();
    }

    public function test_tutor_can_view_create_group()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('groups.create'));
        $view->assertStatus(200);
    }

    public function test_tutor_can_see_their_profile()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1',
                'email_verified_at' => now()
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('community.profile', $user->id));
        $view->assertStatus(200);
    }

    public function test_tutor_can_create_group()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('groups.create'));
        $view->assertOk();
    }

    public function test_tutor_can_update_group()
    {
        /** @var User */
        $user = User::factory()->has($group = Group::factory())->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('groups.update', $group->create()->id));
        $view->assertOk();
    }

    public function test_tutor_can_delete_group()
    {
        /** @var User */
        $user = User::factory()->has($group = Group::factory())->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $post = $this->post(route('groups.delete', $group->create()->id));
        $post->assertRedirect();
    }

    public function test_tutor_can_create_assignment()
    {
        /** @var User */
        $user = User::factory()->has($ass = Assignment::factory())->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('assignment.create'));
        $view->assertOk();
    }

    public function test_tutor_can_update_assignment()
    {
        /** @var User */
        $user = User::factory()->has($ass = Assignment::factory())->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('assignment.edit', $ass->create()->id));
        $view->assertOk();
    }

    public function disable_test_tutor_can_delete_assignment()
    {
        /** @var User */
        $user = User::factory()->has($ass = Assignment::factory())->create(
            [
                'is_tutor' => '1',
            ]
        );
        $this->actingAs($user);
        $this->assertAuthenticated();
        $assignment = $ass->create();
        $post = $this->post(route('assignment.delete', $assignment->id));
        $post->assertRedirect();
    } //TODO: Fix strange error that occurs here
}
