<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{

    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'resolved' => $this->faker->boolean(),
            'post_id' => Post::query()->get('id')->random(),
            'user_id' => User::query()->get('id')->random(),
            'reason' => 'Testing Only',
            'severity' => 'High',
            'comment' => $this->faker->unique()->text(),
        ];
    }
}
