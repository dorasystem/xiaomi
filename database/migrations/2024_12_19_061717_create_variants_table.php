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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->text('storage')->nullable();
            $table->text('ram')->nullable();
            $table->text('price')->nullable();
            $table->text('color_uz')->nullable();
            $table->text('color_ru')->nullable();
            $table->text('color_en')->nullable();
            $table->text('image')->nullable();
            $table->json('images')->nullable();
            $table->text('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
