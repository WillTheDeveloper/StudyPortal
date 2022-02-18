<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class StudentTest extends TestCase
{
//  This test it to see if students can access all the pages that they need to.

    public function test_student_can_see_dashboard()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/dashboard');
        $view->assertStatus(200);
    }

    public function test_student_can_see_timetable()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/timetable');
        $view->assertStatus(200);
    }

    public function test_student_can_see_assignments()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/assignments');
        $view->assertStatus(200);
    }

    public function test_student_can_see_community()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/community');
        $view->assertStatus(200);
    }

    public function test_student_can_see_profile()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/profile');
        $view->assertStatus(200);
    }

    /*public function test_student_can_see_subscribe()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/subscribe');
        $view->assertStatus(200);
    }*/

    public function test_student_cant_see_groups()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/groups');
        $view->assertUnauthorized();
    }

    public function test_student_cant_see_users()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/users');
        $view->assertUnauthorized();
    }

    public function test_student_can_see_their_profile()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get('/community/'.$user->id);
        $view->assertStatus(200);
    }

    /*public function test_student_can_see_post()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $subject = Subject::factory()->create(
            [
                'subject' => 'testing only'
            ]
        );
        $post = Post::factory()->create(
            [
                'title' => 'testing only',
                'body' => 'ignore this',
                'user_id' => $user->id,
                'subject_id' => $subject->id
            ]
        );
        $view = $this->get('/community/post/'.$post->id);
        $view->assertStatus(200);
    }*/
}
