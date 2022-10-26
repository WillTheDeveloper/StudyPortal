<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    protected $model = Discussion::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'body' => $this->faker->paragraph,
            'group_id' => Group::query()->get('id')->random(),
            'user_id' => User::query()->get('id')->random(),
            'locked' => $this->faker->boolean
        ];
    }
}
