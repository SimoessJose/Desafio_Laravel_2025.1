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
        Admin::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin',
            'cpf' => '12345678901',
            'password' => 'admin', 
            'number' => '11987654321',
            'address' => '123 Admin St',
            'date_birth' => '1990-01-01',
            'image' => '',
            'admin_id' => null, 
        ]);

        Admin::factory(6)->create();

        Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'tests@example.com',
            'cpf' => '123.456.789-09',
            'number' => '12345678909', 
            'password' => bcrypt('password'),
            'address' => '1234 Test St',
            'date_birth' => now(),
            'image' => '',
            'admin_id' => Admin::inRandomOrder()->value('id'),
        ]);
    }
}
