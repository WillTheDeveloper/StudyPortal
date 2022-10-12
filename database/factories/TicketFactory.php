<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'student_id' => User::query()->where('is_tutor', false)->get('id')->random(),
            'tutor_id' => User::query()->where('is_tutor', true)->get('id')->random(),
            'question' => $this->faker->sentence . "?",
            'subject_id' => Subject::query()->get('id')->random(),
            'details' => $this->faker->sentences,
            'status' => $this->faker->randomElement(['new', 'active', 'cancelled', 'completed'])
        ];
    }
}
