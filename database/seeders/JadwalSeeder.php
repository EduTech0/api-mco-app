<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jadwal::factory(20)->create();

        // 1 Januari 2024
        Jadwal::create([
            'tanggal' => '2024-01-01',
            'waktu_1' => '09:00',
            'waktu_2' => '10:00',
            'kuota' => '8',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-01',
            'waktu_1' => '10:00',
            'waktu_2' => '11:00',
            'kuota' => '5',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-01',
            'waktu_1' => '13:00',
            'waktu_2' => '14:00',
            'kuota' => '7',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-01',
            'waktu_1' => '20:00',
            'waktu_2' => '21:00',
            'kuota' => '5',
            'tersisa' => '2'
        ]);

        // 2 Januari 2024
        Jadwal::create([
            'tanggal' => '2024-01-02',
            'waktu_1' => '08:00',
            'waktu_2' => '09:00',
            'kuota' => '10',
            'tersisa' => '6'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-02',
            'waktu_1' => '09:00',
            'waktu_2' => '10:00',
            'kuota' => '8',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-02',
            'waktu_1' => '13:00',
            'waktu_2' => '14:00',
            'kuota' => '7',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-02',
            'waktu_1' => '16:00',
            'waktu_2' => '17:00',
            'kuota' => '5',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-02',
            'waktu_1' => '20:00',
            'waktu_2' => '21:00',
            'kuota' => '3',
            'tersisa' => '2'
        ]);

        // 3 Januari 2024
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '08:00',
            'waktu_2' => '09:00',
            'kuota' => '8',
            'tersisa' => '8'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '09:00',
            'waktu_2' => '10:00',
            'kuota' => '8',
            'tersisa' => '8'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '10:00',
            'waktu_2' => '11:00',
            'kuota' => '5',
            'tersisa' => '1'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '13:00',
            'waktu_2' => '14:00',
            'kuota' => '7',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '16:00',
            'waktu_2' => '17:00',
            'kuota' => '5',
            'tersisa' => '5'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-03',
            'waktu_1' => '20:00',
            'waktu_2' => '21:00',
            'kuota' => '5',
            'tersisa' => '2'
        ]);

        // 4 Januari 2024
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '08:00',
            'waktu_2' => '09:00',
            'kuota' => '8',
            'tersisa' => '8'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '09:00',
            'waktu_2' => '10:00',
            'kuota' => '8',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '10:00',
            'waktu_2' => '11:00',
            'kuota' => '7',
            'tersisa' => '3'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '13:00',
            'waktu_2' => '14:00',
            'kuota' => '7',
            'tersisa' => '0'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '16:00',
            'waktu_2' => '17:00',
            'kuota' => '5',
            'tersisa' => '5'
        ]);
        Jadwal::create([
            'tanggal' => '2024-01-04',
            'waktu_1' => '20:00',
            'waktu_2' => '21:00',
            'kuota' => '5',
            'tersisa' => '2'
        ]);
    }
}
