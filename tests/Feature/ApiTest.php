<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Str;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function new_user()
    {
        $user = User::factory()->create();
        $user->createToken(Str::random('5'));
        $this->actingAs($user);
        $this->assertAuthenticated();
    }

    public function test_user_endpoint_as_guest()
    {
        $this->assertGuest();
        $response = $this->getJson(route('api.user'));
        $response->assertUnauthorized();
    }

    /*public function test_find_post_as_user()
    {
        $this->new_user();
        $post = Post::factory()->create();
        $response = $this->getJson(route('api.post.id', $post->id));
        $response->assertOk();
    }*/

    public function test_user_endpoint_as_user()
    {
        $this->new_user();
        $user = auth()->user();
        $response = $this->getJson(route('api.user'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'admin' => $user->is_admin,
                'moderator' => $user->is_moderator,
                'tutor' => $user->is_tutor,
                'banned' => $user->is_banned,
            ]
        ]);
    }
}
