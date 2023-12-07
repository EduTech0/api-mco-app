<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 51),
            'nama_lengkap' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'berat' => fake()->numberBetween(40, 100),
            'tinggi' => fake()->numberBetween(140, 200),
            'usia' => fake()->numberBetween(18, 60),
            'pekerjaan' => fake()->jobTitle(),
            'alamat' => fake()->address(),
            'nomor' => fake()->numerify('############'),
            'olahraga' => fake()->randomElement(['Hobi', 'Atlet', 'Lainnya']),
            'cabang' => fake()->word(),
            'penyebab' => fake()->sentence(),
            'lama_cedera' => fake()->randomElement(['<1minggu', '<1bulan', '<1tahun', '>1tahun']),
            'jumlah_terapi' => fake()->randomElement(['belum', '1kali', '>1kali']),
            'status' => fake()->randomElement([0, 1, 2])
        ];
    }
}
