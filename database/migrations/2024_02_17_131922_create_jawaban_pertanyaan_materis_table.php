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
        Schema::create('jawaban_pertanyaan_materis', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pertanyaan_materi_id');
            $table->foreign('pertanyaan_materi_id')->references('id')->on('pertanyaan_materis')->onDelete('cascade');
            $table->text('jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_pertanyaan_materis');
    }
};
