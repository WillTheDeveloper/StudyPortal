<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    protected $model = Assignment::class;

    public function definition()
    {
        return [
            'title' => $this->faker->unique()->title(),
            'duedate' => $this->faker->unique()->dateTime(),
            'setdate' => $this->faker->unique()->dateTime(),
            'subject_id' => Subject::query()->first()->id,
            'details' => $this->faker->unique()->paragraph(),
        ];
    }
}
