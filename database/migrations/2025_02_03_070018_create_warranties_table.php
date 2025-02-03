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
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // URL uchun slug
            $table->string('title_uz'); // O'zbekcha nom
            $table->string('title_en'); // Inglizcha nom
            $table->string('title_ru'); // Ruscha nom
            $table->text('content_uz'); // O'zbekcha kontent
            $table->text('content_en'); // Inglizcha kontent
            $table->text('content_ru'); // Ruscha kontent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};
