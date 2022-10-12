<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'product_id' => Product::query()->get('id')->random(),
            'review' => $this->faker->sentences,
            'rating' => $this->faker->randomElement([1,2,3,4,5])
        ];
    }
}
