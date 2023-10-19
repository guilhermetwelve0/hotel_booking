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
        Schema::table('guests', function (Blueprint $table) {
            $table->string('last_name', 255)->default(0);
            $table->string('cpf', 11)->default(0);
            $table->string('birthday', 255)->default(0);
            $table->char('sex', 1)->default(0);
            $table->string('emergency_phone', 14)->default(0);
            $table->string('cep', 10)->default(0);
            $table->string('street', 150)->default(0);
            $table->string('neighborhood', 20)->default(0);
            $table->string('city', 50)->default(0);
            $table->char('state', 2)->default(0);
            $table->integer('registered_by')->unsigned(); // Chave estrangeira
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
