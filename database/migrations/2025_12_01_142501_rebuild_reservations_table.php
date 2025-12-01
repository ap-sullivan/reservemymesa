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

   Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');   // Primary key
            $table->unsignedBigInteger('restaurant_id');  // fk to restaurant
             $table->unsignedBigInteger('customer_id')->nullable();   // fk to user
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->integer('pax_count');
            $table->text('requests')->nullable();
            $table->timestamps();

            // fk constraints
            $table->foreign('restaurant_id')
                  ->references('restaurant_id')->on('restaurants')
                  ->onDelete('cascade');

            $table->foreign('customer_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
