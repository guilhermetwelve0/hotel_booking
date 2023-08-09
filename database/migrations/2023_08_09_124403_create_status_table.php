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
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->uuid('booking_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('booking_id')
                ->references('id')->on('bookings')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
