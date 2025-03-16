<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(36)->create();

        Product::factory()->create([
            'name' => 'Test Product',
            'description' => 'Test Product Description',
            'price' => 100.00,
            'quantity' => 10,
            'image' => '',
            'category' => 'Test Category',
            'user_id' => User::inRandomOrder()->value('id'), 
        ]);
    }
}
