<?php

namespace Database\Factories;

use App\Models\Kanban;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kanban>
 */
class KanbanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kanban::class;

    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'description' => $this->faker->paragraph,
            'name' => $this->faker->jobTitle
        ];
    }
}
