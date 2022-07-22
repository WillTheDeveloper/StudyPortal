<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => $this->faker->paragraph,
            'user_id' => User::query()->get('id')->random(),
            'group_id' => Group::query()->get('id')->random(),
            'discussion_id' => Discussion::query()->get('id')->random()
        ];
    }
}
