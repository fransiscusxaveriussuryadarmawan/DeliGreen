<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_date' => $this->faker->dateTime(),
            'total_price' => 0,
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
