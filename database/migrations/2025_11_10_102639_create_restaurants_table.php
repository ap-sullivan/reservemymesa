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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id('restaurant_id');
            $table->string('name', 128);
            $table->string('house_number', 64)->nullable();
            $table->string('address_line_1', 128);
            $table->string('address_line_2', 128)->nullable();
            $table->string('city',64);
            $table->string('postcode', 16);
            $table->string('email')->unique();
            $table->string('phone', 20)->nullable();
            $table->string('main_contact', 128)->nullable();
            $table->boolean('trading')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
