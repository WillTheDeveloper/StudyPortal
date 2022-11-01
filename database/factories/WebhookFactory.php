<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Webhook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Webhook>
 */
class WebhookFactory extends Factory
{
    protected $model = Webhook::class;

    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'url' => $this->faker->url,
            'name' => $this->faker->name,
            'posts' => $this->faker->boolean('50'),
            'comments' => $this->faker->boolean('50'),
            'assignments' => $this->faker->boolean('50'),
            'blog' => $this->faker->boolean('50'),
            'active' => $this->faker->boolean('50'),
        ];
    }
}
