<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'subject_id' => Subject::query()->get('id')->random(),
        ];
    }
}
