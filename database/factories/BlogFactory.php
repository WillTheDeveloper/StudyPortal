<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'body' => $this->faker->paragraph(5),
            'content_type' => 'Testing',
            'user_id' => User::factory()->create()->id,
            'slug' => $this->faker->slug(4),
            'url' => 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
            'visible' => 1,
            'replies' => 0,
        ];
    }
}
