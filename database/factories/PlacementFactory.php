<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Placement>
 */
class PlacementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'location' => $this->faker->city,
            'company' => $this->faker->company,
            'role' => $this->faker->jobTitle,
            'title' => $t =$this->faker->jobTitle,
            'slug' => Str::slug($t)
        ];
    }
}
