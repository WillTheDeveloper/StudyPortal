<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'body' => $this->faker->paragraph(2),
            'user_id' => User::query()->first()->id,
            'subject_id' => Subject::query()->first()->id
        ];
    }
}
