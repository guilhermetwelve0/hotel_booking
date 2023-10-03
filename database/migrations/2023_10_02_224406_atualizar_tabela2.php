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
        Schema::table('rooms', function (Blueprint $table) {
            $table->text('description');
            $table->string('price_per_day', 255);
            $table->bigInteger('branch_id')->unsigned();
            $table->integer('status', 11);
            $table->string('status_reservation', 255);
            $table->bigInteger('created_by')->unsigned();
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
