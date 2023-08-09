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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('total', 15, 2)->default(0);
            $table->uuid('guest_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('guest_id')
                ->references('id')->on('guests')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
