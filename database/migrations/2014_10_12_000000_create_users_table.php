<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_hp')->unique();
            $table->enum('jk', ['L', 'P']);
            $table->string('foto_ktp')->default('default.png');
            $table->enum('level', ['admin', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user ->nama = 'admin';
        $user ->email = 'admin@mail.com';
        $user ->no_hp = '123123';
        $user ->jk = 'L';
        $user ->password = bcrypt('123');
        $user ->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
