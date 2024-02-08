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
        Schema::create('about_multi_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_id');
            $table->unsignedBigInteger('multi_image_id');
            $table->timestamps();

            $table->foreign('about_id')
                ->references('id')
                ->on('abouts')
                ->onDelete('cascade');
            $table->foreign('multi_image_id')
                ->references('id')
                ->on('multi_images')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_multi_image');
    }
};
