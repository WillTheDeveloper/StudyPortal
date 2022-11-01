<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'details' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeThisMonth,
            'start' => $this->faker->time,
            'end' => $this->faker->time,
            'user_id' => User::query()->get('id')->random(),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high'])
        ];
    }
}
