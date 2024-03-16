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
        Schema::create('jawaban_kuesioners', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('kuesioner_id')->nullable();
            $table->foreign('kuesioner_id')->references('id')->on('kuesioners')->nullOnDelete();
            $table->boolean('sangat_tidak_setuju');
            $table->boolean('tidak_setuju');
            $table->boolean('setuju');
            $table->boolean('sangat_setuju');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_kuesioners');
    }
};