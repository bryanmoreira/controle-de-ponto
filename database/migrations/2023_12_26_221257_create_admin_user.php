<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Facade;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(DB::table('users')->where('cpf', '12345678910')->doesntExist()) {
            DB::table('users')->insert([
                'cpf' => '12345678910',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('123'),
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
        Schema::dropIfExists('admin_user');
    }
};
