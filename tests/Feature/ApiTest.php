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
    public function test_can_get_collection_of_users()
    {

    }

    public function test_can_get_a_resource_for_user()
    {
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $this->actingAs($user);
        $user->createToken('testing');
        $this->withToken('testing');

        $response = $this->getJson(route('api.user.resource', $user->id));

        $response
            ->assertOk()
            ->assertJson([
                'data' => [
                    'name' => true,
                ]
            ])->assertJsonMissing([
                'password' => true
            ]);
    }
}
