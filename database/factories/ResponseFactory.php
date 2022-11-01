<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Response::class;

    public function definition()
    {
        return [
            'response' => $this->faker->paragraph,
            'user_id' => User::query()->get('id')->random(),
            'blog_id' => Blog::query()->get('id')->random()
        ];
    }
}
