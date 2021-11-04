<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestTest extends TestCase
{
    //This is a test for people who are not logged in yet.

    public function test_guest_can_see_home()
    {
        $view = $this->get('/');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_features()
    {
        $view = $this->get('/features');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_pricing()
    {
        $view = $this->get('/pricing');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_contact()
    {
        $view = $this->get('/contact');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_login()
    {
        $view = $this->get('/login');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_register()
    {
        $view = $this->get('/register');
        $view->assertStatus(200);
    }

    public function test_guest_can_see_password_reset()
    {
        $view = $this->get('/forgot-password');
        $view->assertStatus(200);
    }

    public function test_guest_cant_see_dashboard()
    {
        $render = $this->get('/dashboard');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_timetable()
    {
        $render = $this->get('/timetable');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_assignments()
    {
        $render = $this->get('/assignments');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_community()
    {
        $render = $this->get('/community');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_profile()
    {
        $render = $this->get('/profile');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_subscribe()
    {
        $render = $this->get('/subscribe');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_groups()
    {
        $render = $this->get('/groups');
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_users()
    {
        $render = $this->get('/users');
        $render->assertRedirect('/login');
    }
}
