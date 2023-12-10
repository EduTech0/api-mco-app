<?php

namespace Database\Seeders;

use App\Models\Cedera;
use Illuminate\Database\Seeder;

class CederaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cedera::create([
            'name' => 'Cedera Piriformis Syndrom',
            'harga' => '350000',
            'image' => 'Piriformis Syndrom.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Pergelangan Tangan',
            'harga' => '200000',
            'image' => 'Pergelangan Tangan.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Siku',
            'harga' => '200000',
            'image' => 'Siku.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Lutut',
            'harga' => '250000',
            'image' => 'Lutut.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Leher',
            'harga' => '200000',
            'image' => 'Leher.png'
        ]);
        Cedera::create([
            'name' => 'Cedera LBP',
            'harga' => '300000',
            'image' => 'LBP.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Panggul',
            'harga' => '200000',
            'image' => 'Panggul.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Jari Tangan',
            'harga' => '200000',
            'image' => 'Jari Tangan.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Angkle',
            'harga' => '200000',
            'image' => 'Angkle.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Punggung',
            'harga' => '250000',
            'image' => 'Punggung.png'
        ]);
        Cedera::create([
            'name' => 'Cedera HNP',
            'harga' => '350000',
            'image' => 'HNP.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Bahu',
            'harga' => '250000',
            'image' => 'Bahu.png'
        ]);
    }
}
