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
        Schema::create('alasans', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('penilaian_id')->references('id')->on('penilaians')->onDelete('cascade');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alasans');
    }
};
