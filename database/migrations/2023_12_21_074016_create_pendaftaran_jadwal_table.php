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
        Schema::create('pendaftaran_jadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftaran_id')->onDelete('cascade');
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans');

            $table->unsignedBigInteger('jadwal_id')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('jadwals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_jadwal');
    }
};
