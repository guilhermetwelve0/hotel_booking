<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id(); // Isso define uma única coluna 'id' como chave primária e auto_increment.
            $table->string('name');
            $table->text('description');
            $table->integer('status');
            $table->integer('created_by');
            $table->timestamps(); // Isso adiciona as colunas 'created_at' e 'updated_at'.
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
