<?php

namespace Database\Factories;

use App\Models\Placement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Placement>
 */
class PlacementFactory extends Factory
{
    protected $model = Placement::class;

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
