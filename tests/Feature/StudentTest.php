<?php

namespace Tests\Feature;

use App\Models\Assignment;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Note;
use App\Models\Post;
use App\Models\Report;
use App\Models\Subject;
use App\Models\User;
use Database\Factories\SubjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class StudentTest extends TestCase
{
    //  This test it to see if students can access all the pages that they need to.

    public function new_student()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();

        return $user;
    }

    public function test_student_can_see_dashboard()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('dashboard'));
        $view->assertStatus(200);
    }

    public function test_student_can_see_timetable()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('timetable'));
        $view->assertStatus(200);
    }

    public function test_student_can_see_assignments()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('assignments'));
        $view->assertStatus(200);
    }

    public function test_student_can_see_community()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('community'));
        $view->assertStatus(200);
    }

    public function test_student_can_see_profile()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('profile'));
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
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('groups'));
        $view->assertUnauthorized();
    }

    public function test_student_cant_see_users()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('groups'));
        $view->assertUnauthorized();
    }

    public function test_student_can_see_their_profile()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'email_verified_at' => now()
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
        $view = $this->get(route('community.profile', $user->id));
        $view->assertStatus(200);
    }

    public function test_student_can_see_post()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'email_verified_at' => now()
            ]
        );
        $auth = $this->actingAs($user);
        $auth->assertAuthenticated();
        $subject = Subject::factory()->create();
        $post = Post::factory()->create(
            [
                'user_id' => $user->id,
                'subject_id' => $subject->id,
            ]
        );
        $this->assertModelExists($post);
        $view = $this->get(route('community.post', $post->slug));
        $view->assertOk();
    }

    public function test_student_can_create_post()
    {
        $post = Post::factory()->for(User::factory()->create())->create();
        $this->assertModelExists($post);
    }

    public function test_student_can_create_comment()
    {
        $comment = Comment::factory()->for(User::factory()->create())->create();
        $this->assertModelExists($comment);
    }

    public function test_student_can_view_assignment()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $assignment = Assignment::factory()->create();
        $this->assertModelExists($assignment);
        $view = $this->get(route('assignments.manage', $assignment->id));
        $view->assertOk();
    }

    public function test_student_can_view_subject()
    {
        /** @var User */
        $user = User::factory()->has($subject = Subject::factory())->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('community.subject', $subject->create()->id));
        $view->assertOk();
    }

    public function test_student_can_not_create_assignment()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('assignment.create'));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_update_assignment()
    {
        $ass = Assignment::factory()->create();
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('assignment.edit', $ass->id));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_delete_assignment()
    {
        $ass = Assignment::factory()->create();
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $post = $this->post(route('assignment.delete', $ass->id));
        $post->assertUnauthorized();
    }

    public function test_student_can_not_create_group()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('groups.create'));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_update_group()
    {
        $group = Group::factory()->create();
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('groups.update', $group->id));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_delete_group()
    {
        $group = Group::factory()->create();
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $post = $this->post(route('groups.delete', $group->id));
        $post->assertUnauthorized();
    }

    public function test_student_can_not_overview_reports()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('reports.overview'));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_see_unresolved_reports()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('reports.unresolved'));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_see_resolved_reports()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('reports.resolved'));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_resolve_report()
    {
        /** @var User */
        $user = User::factory()->create();
        $report = Report::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->post(route('reports.resolve.id', $report->id));
        $view->assertUnauthorized();
    }

    public function test_student_can_not_unresolve_report()
    {
        /** @var User */
        $user = User::factory()->create();
        $report = Report::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->post(route('reports.unresolve.id', $report->id));
        $view->assertUnauthorized();
    }

    public function test_student_can_see_notes()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('note.show'));
        $view->assertStatus(200);
    }

    public function test_student_can_create_notes()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $view = $this->get(route('note.create'));
        $view->assertStatus(200);
    }

    public function test_student_can_edit_notes()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $note = Note::factory()->create(
            [
                'user_id' => $user->id,
            ]
        );
        $view = $this->get(route('note.edit', $note->id));
        $view->assertStatus(200);
    }

    public function test_student_can_list_notes()
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticated();
        $note = Note::factory()->create(
            [
                'user_id' => $user->id,
            ]
        );
        $view = $this->get(route('note.show'));
        $view->assertSeeText($note->name);
    }

    public function new_blog()
    {
        $b = Blog::factory()->create(
            [
                'visible' => 1,
                'replies' => 0
            ]
        );
        $this->assertModelExists($b);
        return $b;
    }

    public function test_student_can_see_blog()
    {
        $this->new_student();
        $b = $this->new_blog();
        $render = $this->get(route('blog'));
        $render->assertStatus(200);
        $render->assertSeeText($b->title);
    }

    public function test_student_can_see_blog_post()
    {
        $this->new_student();
        $b = $this->new_blog();
        $render = $this->get(route('blog.show', $b->slug));
        $render->assertStatus(200);
        $render->assertSeeText($b->title);
    }

    public function test_student_cant_create_blog_post()
    {
        $this->new_student();
        $render = $this->get(route('blog.create'));
        $render->assertUnauthorized();
    }

    public function test_student_cant_see_hidden_blog_posts()
    {
        $this->new_student();
        $render = $this->get(route('blog.hidden'));
        $render->assertUnauthorized();
    }

    public function update_blog_post(string $route, $blog)
    {
        $post = $this->post(route($route, $blog->slug));
        $post->assertUnauthorized();
    }

    public function test_student_cant_make_blog_public()
    {
        $b = $this->new_blog();
        $this->new_student();
        $this->update_blog_post('blog.make-visible', $b);
    }

    public function test_student_cant_make_blog_hidden()
    {
        $b = $this->new_blog();
        $this->new_student();
        $this->update_blog_post('blog.make-hidden', $b);
    }

    public function test_student_cant_enable_replies_blog()
    {
        $b = $this->new_blog();
        $this->new_student();
        $this->update_blog_post('blog.enable-replies', $b);
    }

    public function test_student_cant_disable_replies_blog()
    {
        $b = $this->new_blog();
        $this->new_student();
        $this->update_blog_post('blog.disable-replies', $b);
    }
}
