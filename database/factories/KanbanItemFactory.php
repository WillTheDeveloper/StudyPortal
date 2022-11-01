<?php

namespace Database\Factories;

use App\Models\Kanban;
use App\Models\KanbanGroup;
use App\Models\KanbanItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KanbanItem>
 */
class KanbanItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KanbanItem::class;

    public function definition()
    {
        return [
            'item' => $this->faker->text,
            'user_id' => User::query()->get('id')->random(),
            'kanban_group_id' => KanbanGroup::query()->get('id')->random(),
            'kanban_id' => Kanban::query()->get('id')->random()
        ];
    }
}
