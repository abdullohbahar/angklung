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
        Schema::create('capaian_pembelajaran_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('capaian_pembelajaran_id');
            $table->foreign('capaian_pembelajaran_id')->references('id')->on('capaian_pembelajarans')->onDelete('cascade');
            $table->text('files');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_pembelajaran_files');
    }
};
