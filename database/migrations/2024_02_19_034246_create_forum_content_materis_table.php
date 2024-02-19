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
        Schema::create('forum_content_materis', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('forum_materis_id');
            $table->foreign('forum_materis_id')->references('id')->on('forum_materis')->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_content_materis');
    }
};
