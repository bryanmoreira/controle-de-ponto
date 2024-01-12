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
        Schema::create('pontos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cpf');
            $table->string('user_name');
            $table->date('data');
            $table->timestamp('inicio_expediente')->nullable();
            $table->timestamp('inicio_almoco')->nullable();
            $table->timestamp('final_almoco')->nullable();
            $table->timestamp('final_expediente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontos');
    }
};
