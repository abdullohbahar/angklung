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
        Schema::create('riwayat_penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('penilaian_id')->references('id')->on('penilaians')->onDelete('cascade');
            $table->string('jawaban_soal');
            $table->string('jawaban_alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penilaians');
    }
};
