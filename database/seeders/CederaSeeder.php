<?php

namespace Database\Seeders;

use App\Models\Cedera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'images' => 'Piriformis Syndrom.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Pergelangan Tangan',
            'harga' => '200000',
            'images' => 'Pergelangan Tangan.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Siku',
            'harga' => '200000',
            'images' => 'Siku.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Lutut',
            'harga' => '250000',
            'images' => 'Lutut.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Leher',
            'harga' => '200000',
            'images' => 'Leher.png'
        ]);
        Cedera::create([
            'name' => 'Cedera LBP',
            'harga' => '300000',
            'images' => 'LBP.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Panggul',
            'harga' => '200000',
            'images' => 'Panggul.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Jari Tangan',
            'harga' => '200000',
            'images' => 'Jari Tangan.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Angkle',
            'harga' => '200000',
            'images' => 'Angkle.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Punggung',
            'harga' => '250000',
            'images' => 'Punggung.png'
        ]);
        Cedera::create([
            'name' => 'Cedera HNP',
            'harga' => '350000',
            'images' => 'HNP.png'
        ]);
        Cedera::create([
            'name' => 'Cedera Bahu',
            'harga' => '250000',
            'images' => 'Bahu.png'
        ]);
    }
}
