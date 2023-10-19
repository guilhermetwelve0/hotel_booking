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
        Schema::table('room_service_facility', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->string('product_id', 11)->default(0);
            $table->string('status', 255)->default(0);
            $table->bigInteger('created_by')->unsigned()->default(0);
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
