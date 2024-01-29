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
        Schema::create('riwayat_presensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presensi_id');
            $table->foreign('presensi_id')->references('id')->on('presensis')->onDelete('cascade');
            $table->foreignUuid('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['masuk', 'tidak masuk']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_presensis');
    }
};
