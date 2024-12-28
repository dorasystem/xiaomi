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
        Schema::create('static_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('key');  // Kalit so'z (masalan: 'welcome_message')
            $table->string('en');   // Inglizcha tarjima
            $table->string('ru');   // Ruscha tarjima
            $table->string('uz');   // O'zbekcha tarjima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_keywords');
    }
};
