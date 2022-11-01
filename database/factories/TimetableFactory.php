<?php

namespace Database\Factories;

use App\Models\Institution;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Timetable::class;

    public function definition()
    {
        return [
            'start' => $this->faker->time,
            'end' => $this->faker->time,
            'subject_id' => Subject::query()->get('id')->random(),
            'institution_id' => Institution::query()->get('id')->random(),
            'user_id' => User::query()->get('id')->random(),
            'weekday' => $this->faker->dayOfWeek,
            'room' => $this->faker->countryCode()
        ];
    }
}
