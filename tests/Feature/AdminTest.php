<?php

namespace Tests\Feature;

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
        $view = $this->get('/users');
        $view->assertStatus(200);
    }
}
