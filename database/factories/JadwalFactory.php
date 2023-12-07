<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => fake()->date(),
            'waktu_1' => fake()->time('H:i', '09:00'),
            'waktu_2' => fake()->time('H:i', '10:00'),
            'kuota' => fake()->numberBetween(4, 10),
            'tersisa' => fake()->numberBetween(0, 10),
        ];
    }
}
