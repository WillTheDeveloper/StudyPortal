<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Task::class;

    public function definition()
    {
        return [
            'task' => $this->faker->jobTitle,
            'details' => $this->faker->paragraph,
            'user_id' => User::query()->get('id')->random(),
            'due' => $this->faker->dateTimeThisMonth,
            'complete' => $this->faker->boolean('40'),
        ];
    }
}
