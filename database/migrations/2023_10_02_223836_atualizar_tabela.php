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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status'); // Remova o valor padrão
            $table->text('two_factor_secret')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->string('sub', 255)->nullable();
            $table->integer('profile')->nullable();
            $table->integer('edited_by')->nullable();
            $table->string('picture', 255)->nullable();
            $table->integer('branch')->nullable();
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
