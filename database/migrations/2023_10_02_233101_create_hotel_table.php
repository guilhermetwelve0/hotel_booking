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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            $table->string('branch', 255);
            $table->text('description');
            $table->string('comfort', 255);
            $table->integer('rated');
            $table->string('street', 150);
            $table->string('neighborhood', 20);
            $table->string('city', 50);
            $table->char('state', 2);
            $table->string('cep', 10);
            $table->string('email', 100);
            $table->string('phone', 14);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel');
    }
};
