<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(DB::table('users')->where('cpf', '12312312312')->doesntExist()) {
            DB::table('users')->insert([
                'cpf' => '12312312312',
                'name' => 'Rh User',
                'email' => 'rh@example.com',
                'password' => Hash::make('123'),
                'is_rh' => 1,
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
        Schema::dropIfExists('rh_user');
    }
};
