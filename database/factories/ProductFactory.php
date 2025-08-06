<?php

namespace Database\Factories;

use AddressInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{   
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 1, 9999),
            'image' => '',
            'quantity' => fake()->randomNumber(2),
            'category' => fake()->randomElement(['Eletrônicos', 'Roupas', 'Alimentos', 'Móveis', 'Brinquedos']),
            'user_id' => User::inRandomOrder()->value('id'),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
