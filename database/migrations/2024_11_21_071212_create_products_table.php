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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->text('slug')->unique();
            $table->string('name_uz')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('content_uz')->nullable();
            $table->text('content_ru')->nullable();
            $table->text('content_en')->nullable();
            $table->string('gift_name_uz')->nullable();
            $table->string('gift_name_ru')->nullable();
            $table->string('gift_name_en')->nullable();
            $table->string('gift_image')->nullable();
            $table->string('color_uz')->nullable();
            $table->string('color_ru')->nullable();
            $table->string('color_en')->nullable();
            $table->string('image')->nullable(); // Asosiy rasm uchun ustun
            $table->json('images')->nullable();  // Ko'p rasmlar uchun JSON ustun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
