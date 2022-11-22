<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Institution;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function admin()
    {
        /** @var User */
        $user = User::factory()->create(
            [
                'is_admin' => '1'
            ]
        );
        $response = $this->actingAs($user);
        $response->assertAuthenticated();
    }


//  Test if admins can do what they need to do.
    public function test_admin_can_see_users()
    {
        $this->admin();
        $view = $this->get(route('users'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_reports()
    {
        $this->admin();
        $view = $this->get(route('reports.overview'));
        $view->assertStatus(200);
        $view->assertSeeText("Recent reports");
    }

    public function test_admin_can_see_unresolved_reports()
    {
        $this->admin();
        $view = $this->get(route('reports.unresolved'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_resolved_reports()
    {
        $this->admin();
        $view = $this->get(route('reports.resolved'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_list_of_reports()
    {
        $this->admin();
        $post = Post::factory()->create();
        $report = Report::factory()->create(
            [
                'post_id' => $post->id,
                'user_id' => auth()->id(),
            ]
        );
        $view = $this->get(route('reports.overview'));
        $view->assertStatus(200);
        $view->assertSeeText($report->reason);
    }

    public function test_admin_can_create_blog_post()
    {
        $this->admin();
        $view = $this->get(route('blog.create'));
        $view->assertStatus(200);
    }

    public function test_admin_can_see_hidden_blog_posts()
    {
        $this->admin();
        $view = $this->get(route('blog.hidden'));
        $view->assertStatus(200);
    }

    public function new_blog(int $visible, int $replies)
    {
        $blog = Blog::factory()->create(
            [
                'visible' => $visible,
                'replies' => $replies
            ]
        );

        return $blog;
    }

    public function test_admin_can_make_blog_public()
    {
        $b = $this->new_blog(0, 0);
        $this->admin();
        $post = $this->post(route('blog.make-visible', $b->slug));
        $post->assertRedirect(route('blog.show', $b->slug));
    }

    public function test_admin_can_make_blog_hidden()
    {
        $b = $this->new_blog(1, 0);
        $this->admin();
        $post = $this->post(route('blog.make-hidden', $b->slug));
        $post->assertRedirect(route('blog.hidden'));
    }

    public function test_admin_can_enable_replies_blog()
    {
        $b = $this->new_blog(1, 0);
        $this->admin();
        $post = $this->post(route('blog.enable-replies', $b->slug));
        $post->assertRedirect(route('blog.hidden'));
    }

    public function test_admin_can_disable_replies_blog()
    {
        $b = $this->new_blog(1, 0);
        $this->admin();
        $post = $this->post(route('blog.disable-replies', $b->slug));
        $post->assertRedirect(route('blog.hidden'));
    }

    public function test_admin_can_see_institutions()
    {
        $this->admin();
        $get = $this->get(route('institution.manage'));
        $get->assertOk();
    }

    public function test_admin_can_create_new_institution()
    {
        $this->admin();
        $get = $this->get(route('institution.create'));
        $get->assertOk();
    }

    public function test_admin_can_manage_a_institution()
    {
        $this->admin();
        $org = Institution::factory()->create();
        $this->assertModelExists($org);
        $get = $this->get(route('institution.edit', $org->joincode));
        $get->assertOk();
    }

    public function test_admin_can_user_for_institution()
    {
        $this->admin();
        $org = Institution::factory()->create();
        $this->assertModelExists($org);
        $get = $this->get(route('institution.users', $org->joincode));
        $get->assertOk();
    }

    public function test_admin_can_add_user_to_institution()
    {
        $this->admin();
        $org = Institution::factory()->create();
        $this->assertModelExists($org);
        $get = $this->get(route('institutions.add', $org->joincode));
        $get->assertOk();
    }

    public function test_admin_can_request_deletion_institution()
    {
        $this->admin();
        $org = Institution::factory()->create();
        $this->assertModelExists($org);
        $get = $this->get(route('institution.request-delete', $org->joincode));
        $get->assertOk();
    }
}
