<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $title = $this->faker->text(25),
            'body' => $this->faker->sentence(2),
            'user_id' => User::factory()->create()->id,
            'subject_id' => Subject::factory()->create()->id,
            'views' => $this->faker->randomNumber(8),
            'slug' => Str::slug($title)
        ];
    }
}
