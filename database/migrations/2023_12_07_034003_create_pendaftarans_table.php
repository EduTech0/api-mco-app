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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
            $table->enum('lama_cedera', ['<1minggu', '<1bulan', '<1tahun', '>1tahun']);
            $table->enum('jumlah_terapi', ['belum', '1kali', '>1kali']);
            $table->boolean('status');
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
