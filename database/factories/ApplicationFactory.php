<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Placement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Application::class;

    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'placement_id' => Placement::query()->get('id')->random(),
            'status' => $this->faker->randomElement(['pending', 'interview', 'declined', 'active', 'accepted', 'completed', 'reviewed', 'redacted']),
            'cv' => $this->faker->paragraphs
        ];
    }
}
