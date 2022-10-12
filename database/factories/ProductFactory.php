<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $n = $this->faker->words(3),
            'description' => $this->faker->words,
            'price' => $this->faker->randomNumber(),
            'shipping' => 0,
            'active' => $this->faker->boolean(50),
            'sold' => $this->faker->name,
            'slug' => Str::slug($n),
            'user_id' => User::query()->get('id')->random()
        ];
    }
}
