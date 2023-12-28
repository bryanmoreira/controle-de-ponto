<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(DB::table('users')->where('cpf', '98765432101')->doesntExist()) {
            DB::table('users')->insert([
                'cpf' => '98765432101',
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('123'),
                'admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regular_user');
    }
};
