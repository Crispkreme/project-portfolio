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
        Schema::create('portfolio_multi_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id');
            $table->unsignedBigInteger('multi_image_id');
        
            $table->foreign('portfolio_id')
                ->references('id')
                ->on('portfolios')
                ->onDelete('cascade');
        
            $table->foreign('multi_image_id')
                ->references('id')
                ->on('multi_images')
                ->onDelete('cascade');

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_multi_image');
    }
};
