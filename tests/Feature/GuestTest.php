<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\Blog;
use App\Models\Institution;
use App\Models\Note;
use App\Models\Placement;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestTest extends TestCase
{
    //This is a test for people who are not logged in yet.

    public function test_guest_can_see_home()
    {
        $this->assertGuest();
        $view = $this->get(route('home'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_features()
    {
        $this->assertGuest();
        $view = $this->get(route('features'));
        $view->assertStatus(200);
    }

//    public function test_guest_can_see_pricing()
//    {
//        $view = $this->get(route('pricing'));
//        $view->assertStatus(200);
//    }
//
//    public function test_guest_can_see_contact()
//    {
//        $view = $this->get(route('pricing'));
//        $view->assertStatus(200);
//    }

    public function test_guest_can_see_login()
    {
        $this->assertGuest();
        $view = $this->get(route('login'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_register()
    {
        $this->assertGuest();
        $view = $this->get(route('register'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_password_reset()
    {
        $this->assertGuest();
        $view = $this->get(route('password.request'));
        $view->assertStatus(200);
    }

    public function test_guest_cant_see_dashboard()
    {
        $this->assertGuest();
        $render = $this->get(route('dashboard'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_timetable()
    {
        $this->assertGuest();
        $render = $this->get(route('timetable'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_assignments()
    {
        $this->assertGuest();
        $render = $this->get(route('assignments'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_community()
    {
        $this->assertGuest();
        $render = $this->get(route('community'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_profile()
    {
        $this->assertGuest();
        $render = $this->get(route('profile'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_subscribe()
    {
        $this->assertGuest();
        $render = $this->get(route('subscribe'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_groups()
    {
        $this->assertGuest();
        $render = $this->get(route('groups'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_users()
    {
        $this->assertGuest();
        $render = $this->get(route('users'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_report_overview()
    {
        $this->assertGuest();
        $render = $this->get(route('reports.overview'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_unresolved_reports()
    {
        $this->assertGuest();
        $render = $this->get(route('reports.unresolved'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_resolved_reports()
    {
        $this->assertGuest();
        $render = $this->get(route('reports.resolved'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_notes()
    {
        $this->assertGuest();
        $render = $this->get(route('note.show'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_user_note()
    {
        $this->assertGuest();
        $note = Note::factory()->create();
        $render = $this->get(route('note.render', $note->id));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_edit_user_note()
    {
        $this->assertGuest();
        $note = Note::factory()->create();
        $render = $this->get(route('note.edit', $note->id));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_create_note()
    {
        $this->assertGuest();
        $note = Note::factory()->create();
        $render = $this->get(route('note.create'));
        $render->assertRedirect('/login');
    }

    public function test_guest_can_see_blog()
    {
        $this->assertGuest();
        $render = $this->get(route('blog'));
        $render->assertStatus(200);
    }

    public function test_guest_can_view_blog_post()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create();
        $this->assertModelExists($blog);
        $render = $this->get(route('blog.show', $blog->slug));
        $render->assertStatus(200);
        $render->assertSeeText($blog->title);
    }

    public function test_guest_cant_create_blog_post()
    {
        $this->assertGuest();
        $view = $this->get(route('blog.create'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_hidden_blog_posts()
    {
        $this->assertGuest();
        $view = $this->get(route('blog.hidden'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_make_blog_public()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create();
        $this->assertModelExists($blog);
        $post = $this->post(route('blog.make-visible', $blog->slug));
        $post->assertRedirect(route('login'));
    }

    public function test_guest_cant_make_blog_hidden()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create();
        $this->assertModelExists($blog);
        $post = $this->post(route('blog.make-hidden', $blog->slug));
        $post->assertRedirect(route('login'));
    }

    public function test_guest_cant_enable_replies_blog()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create();
        $this->assertModelExists($blog);
        $post = $this->post(route('blog.enable-replies', $blog->slug));
        $post->assertRedirect(route('login'));
    }

    public function test_guest_cant_disable_replies_blog()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create();
        $this->assertModelExists($blog);
        $post = $this->post(route('blog.disable-replies', $blog->slug));
        $post->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_hidden_blog_post()
    {
        $this->assertGuest();
        $blog = Blog::factory()->create(
            [
                'visible' => 0
            ]
        );
        $get = $this->get(route('blog.show', $blog->slug));
        $get->assertNotFound();
    }

    public function test_guest_cant_see_institutions()
    {
        $this->assertGuest();

        $view = $this->get(route('institution.manage'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_institution()
    {
        $this->assertGuest();
        $view = $this->get(route('institution.create'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_manage_institution()
    {
        $this->assertGuest();
        $institution = Institution::factory()->create()->joincode;
        $view = $this->get(route('institution.edit', $institution));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_institution_users()
    {
        $this->assertGuest();
        $institution = Institution::factory()->create()->joincode;
        $view = $this->get(route('institution.users', $institution));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_add_users_to_institution()
    {
        $this->assertGuest();
        $institution = Institution::factory()->create()->joincode;
        $view = $this->get(route('institutions.add', $institution));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_request_deletion_institution()
    {
        $this->assertGuest();
        $institution = Institution::factory()->create()->joincode;
        $view = $this->get(route('institution.request-delete', $institution));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_can_see_shop()
    {
        $this->assertGuest();
        $view = $this->get(route('shop'));
        $view->assertOk();
    }

    public function test_guest_can_see_product_shop()
    {
        $this->assertGuest();
        $product = Product::factory()->create();
        $this->assertModelExists($product);
        $view = $this->get(route('shop.product', $product->slug));
    }

    public function test_guest_cant_see_completed_todo()
    {
        $this->assertGuest();
        $view = $this->get(route('todo.completed'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_archived_todo()
    {
        $this->assertGuest();
        $view = $this->get(route('todo.archived'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_active_todo()
    {
        $this->assertGuest();
        $view = $this->get(route('todo.all'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_tickets()
    {
        $this->assertGuest();
        $view = $this->get(route('tickets'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_new_tickets()
    {
        $this->assertGuest();
        $view = $this->get(route('ticket.new'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_placements()
    {
        $this->assertGuest();
        $view = $this->get(route('placements'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_one_placement()
    {
        $this->assertGuest();
        $placement = Placement::factory()->create();
        $view = $this->get(route('placement.slug', $placement->slug));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_new_placement()
    {
        $this->assertGuest();
        $view = $this->get(route('placement.new'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_calendar()
    {
        $this->assertGuest();
        $view = $this->get(route('calendar'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_applications()
    {
        $this->assertGuest();
        $view = $this->get(route('applications'));
        $view->assertRedirect(route('login'));
    }

    public function test_guest_cant_see_an_application()
    {
        $this->assertGuest();
        $application = Application::factory()->create();
        $view = $this->get(route('application.id', $application->id));
        $view->assertRedirect(route('login'));
    }

    /*public function test_guest_cant_post_new_institution()
    {

    }

    public function test_guest_cant_submit_new_institution()
    {

    }*/
}
