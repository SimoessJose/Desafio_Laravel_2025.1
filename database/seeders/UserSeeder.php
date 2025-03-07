<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
           // UserSeeder::class,
        ]);

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'cpf' => '123.456.789-19',
            'number' => '12345678909', 
            'password' => bcrypt('password'),
            'address' => '1234 Test St',
            'date_birth' => '1990-01-01',
            'image' => 'default.jpg',
            'balance' => 0,     
            'admin_id' => Admin::inRandomOrder()->value('id'),  
        ]);
    }
}
