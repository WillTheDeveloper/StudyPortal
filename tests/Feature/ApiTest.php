<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function dont_test_can_get_collection_of_users()
    {
        $user = User::factory()->create();
        $user->createToken('tests');
        $this->actingAs($user);
        $this->withToken('tests');
        $response = $this->getJson(route('api.user.collection'));
        $response
            ->assertOk()
            ->assertSimilarJson(
                [
                    'data' => [
                        [
                            'name' => $user->name,
                            'username' => $user->username,
                            'bio' => $user->bio,
                            'created' => $user->created_at,
                            'admin' => $user->is_admin
                        ]
                    ]
                ]
            );
    }
}
