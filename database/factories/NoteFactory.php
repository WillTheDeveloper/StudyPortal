<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class NoteFactory extends Factory
{

    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName(),
            'description' => $this->faker->sentence(),
            'notes' => $this->faker->address(),
            'user_id' => User::query()->get('id')->random()
        ];
    }
}
