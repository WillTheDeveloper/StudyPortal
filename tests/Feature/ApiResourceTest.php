<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiResourceTest extends TestCase
{
    public function admin()
    {
        /** @var User */
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $this->actingAs($user);
        $user->createToken('admin');
        $this->withToken('admin');

        return $user;
    }

    public function auth()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->actingAs($user);
        $user->createToken('auth');
        $this->withToken('auth');

        return $user;
    }

    public function disable_test_can_get_user_resource()
    {
        $user = $this->admin();

        $response = $this->getJson(route('api.user.resource', $user->id));

        $response
            ->assertOk()
            ->assertJson([
                'data' => [
                    'name' => $user->name,
                    'username' => $user->username,
                    'bio' => $user->bio,
                    'created' => $user->created_at,
                    'admin' => $user->is_admin,
                ]
            ])->assertJsonMissing([
                'password' => $user->password
            ]);
    }

    public function test_can_get_post_resource()
    {
        $user = $this->auth();

        $subject = Subject::factory()->create();
        $tag = Tag::factory()->create();
        $post = Post::factory()->create([
            'subject_id' => $subject->id,
            'tag_id' => $tag->id
        ]);

        $response = $this->getJson(route('api.post.slug', $post->slug));

        $response
            ->assertOk()
            ->assertJson([
                'data' => [
                    'title' => $post->title,
                    'body' => $post->body,
                    'user' => $post->User->name,
                    'subject' => $post->Subject->subject,
                    'views' => $post->views,
                    'tag' => $post->Tag->tag
                ]
            ]);
    }
}
