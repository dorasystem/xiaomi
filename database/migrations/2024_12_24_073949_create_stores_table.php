<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('address_uz')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('title_uz')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();  // 10 raqamdan 7 ta decimal uchun
            $table->decimal('longitude', 10, 7)->nullable(); // 10 raqamdan 7 ta decimal uchun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
