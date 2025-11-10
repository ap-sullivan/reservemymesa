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
            $table->id('reservation_id');
            $table->unsignedBigInteger('restaurant_id'); // foreign key to restaurant table
            $table->unsignedBigInteger('customer_id');   // fk to customer table
            $table->unsignedBigInteger('time_slot_id');  // fk to the time slot table
            $table->integer('pax_count');
            $table->text('requests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
