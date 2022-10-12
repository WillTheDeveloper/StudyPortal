<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'ticket_id' => Ticket::query()->get('id')->random(),
            'user_id' => User::query()->get('id')->random(),
            'message' => $this->faker->text,
        ];
    }
}
