<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->integer('user_id');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->integer('berat');
            $table->integer('tinggi');
            $table->integer('usia');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('nomor');
            $table->enum('olahraga', ['Hobi', 'Atlet', 'Lainnya']);
            $table->string('cabang');
            $table->string('penyebab');
            $table->enum('lama_cedera', ['<1 Minggu', '<1 Bulan', '<1 Tahun', '>1 Tahun']);
            $table->enum('jumlah_terapi', ['Belum', '1 Kali', '>1 Kali']);
            $table->boolean('status_pendaftaran');
            $table->boolean('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
