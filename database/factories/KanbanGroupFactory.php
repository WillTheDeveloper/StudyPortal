<?php

namespace Database\Factories;

use App\Models\Kanban;
use App\Models\KanbanGroup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KanbanGroup>
 */
class KanbanGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = KanbanGroup::class;

    public function definition()
    {
        return [
            'group' => $this->faker->name,
            'kanban_id' => Kanban::query()->get('id')->random(),
            'user_id' => User::query()->get('id')->random()
        ];
    }
}
