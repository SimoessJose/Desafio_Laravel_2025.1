<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'cpf' => '123.456.789-09',
            'number' => '12345678909', 
            'password' => bcrypt('password'),
            'address' => '1234 Test St',
            'date_birth' => now(),
            'image' => 'default.jpg',
            'admin_id' => Admin::inRandomOrder()->value('id'),
        ]);
    }
}
