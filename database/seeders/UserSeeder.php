<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        // Admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        // Admin
        User::factory()->create([
            'name' => 'OctaLectzz',
            'email' => 'octavyan4@gmail.com',
            'password' => bcrypt('password'),
            'tanggal_lahir' => '04-10-2006',
            'jenis_kelamin' => 'Laki-Laki',
            'role' => 'Admin',
            'address' => 'Jl.Seta No.32, Larangan RT4/RW4 Gayam Sukoharjo, Jawa Tengah, Indonesia.'
        ]);
    }
}
