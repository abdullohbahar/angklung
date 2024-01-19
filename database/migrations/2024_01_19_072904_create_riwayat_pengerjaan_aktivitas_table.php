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
        Schema::create('riwayat_pengerjaan_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
            $table->foreignUuid('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pengerjaan_aktivitas');
    }
};
