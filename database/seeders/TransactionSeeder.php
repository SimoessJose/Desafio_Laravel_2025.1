<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::factory()->create([
            'quantity' => 5,
            'date' => now(),
            'price' => 100.00,
            'product_id' => \App\Models\Product::inRandomOrder()->value('id'),
            'buyer_id' => \App\Models\User::inRandomOrder()->value('id'),
        ]);

        Transaction::factory(20)->create([
            'buyer_id' => \App\Models\User::inRandomOrder()->value('id'),
        ]);
    }
}
