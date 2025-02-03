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
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();  // product_id ustuni, delete qilingan mahsulotga bog'liq
            $table->text('storage')->nullable();  // Ombor soni
            $table->text('price')->nullable();  // Asosiy narx
            $table->text('discount_price')->nullable();  // Chegirma narxi
            $table->text('sku')->nullable();  // 3 oy bo'lib to'lash narxi
            $table->text('price_3')->nullable();  // 3 oy bo'lib to'lash narxi
            $table->text('price_6')->nullable();  // 6 oy bo'lib to'lash narxi
            $table->text('price_12')->nullable();  // 12 oy bo'lib to'lash narxi
            $table->text('price_24')->nullable();  // 24 oy bo'lib to'lash narxi
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
