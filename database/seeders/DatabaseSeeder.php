<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Seeder
        $this->call(UserSeeder::class);

        // Cedera Seeder
        $this->call(CederaSeeder::class);

        // Pendaftaran Seeder
        $this->call(PendaftaranSeeder::class);

        // Jadwal Seeder
        $this->call(JadwalSeeder::class);
    }
}
