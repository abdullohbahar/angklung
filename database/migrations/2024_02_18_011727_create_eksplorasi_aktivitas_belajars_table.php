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
        Schema::create('eksplorasi_aktivitas_belajars', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('aktivitas_belajar_id')->references('id')->on('aktivitas_belajars')->onDelete('cascade');
            $table->text('embed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eksplorasi_aktivitas_belajars');
    }
};
