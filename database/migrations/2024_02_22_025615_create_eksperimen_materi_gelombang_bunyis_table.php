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
        Schema::create('eksperimen_materi_gelombang_bunyis', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_answered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eksperimen_materi_gelombang_bunyis');
    }
};
