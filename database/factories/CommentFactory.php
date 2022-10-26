<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{

    protected $model = Comment::class;

    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph(2),
            'user_id' => User::query()->get('id')->random(),
            'post_id' => Post::query()->get('id')->random(),
        ];
    }
}
