<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => fake()->numberBetween(1, 10),
            'date' => fake()->dateTimeBetween('-30 days'),
            'price' => fake()->randomFloat(2, 10, 1000),
            //'reference_id' => Str::random(10),
            //'status' => fake()->randomElement(['pending', 'completed', 'failed']),
            'product_id' => \App\Models\Product::inRandomOrder()->value('id'),
            'buyer_id' => '1',
        ];
    }
}
