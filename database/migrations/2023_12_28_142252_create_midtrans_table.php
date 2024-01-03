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
        Schema::create('midtrans', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('pendaftaran_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->integer('total');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->string('snapToken')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midtrans');
    }
};
