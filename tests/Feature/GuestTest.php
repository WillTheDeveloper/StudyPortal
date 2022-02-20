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
        $view = $this->get(route('home'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_features()
    {
        $view = $this->get(route('features'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_pricing()
    {
        $view = $this->get(route('pricing'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_contact()
    {
        $view = $this->get(route('pricing'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_login()
    {
        $view = $this->get(route('login'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_register()
    {
        $view = $this->get(route('register'));
        $view->assertStatus(200);
    }

    public function test_guest_can_see_password_reset()
    {
        $view = $this->get(route('password.request'));
        $view->assertStatus(200);
    }

    public function test_guest_cant_see_dashboard()
    {
        $render = $this->get(route('dashboard'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_timetable()
    {
        $render = $this->get(route('timetable'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_assignments()
    {
        $render = $this->get(route('assignments'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_community()
    {
        $render = $this->get(route('community'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_profile()
    {
        $render = $this->get(route('profile'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_subscribe()
    {
        $render = $this->get(route('subscribe'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_groups()
    {
        $render = $this->get(route('groups'));
        $render->assertRedirect('/login');
    }

    public function test_guest_cant_see_users()
    {
        $render = $this->get(route('users'));
        $render->assertRedirect('/login');
    }
}
