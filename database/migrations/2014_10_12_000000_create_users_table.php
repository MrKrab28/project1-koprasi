<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_hp');
            $table->enum('jk', ['L', 'P']);
            $table->string('no_rekening')->unique();
            $table->string('bank');
            $table->date('tgl_bergabung')->default(now());
            $table->string('foto_ktp')->default('default.png');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user->nik = '7371112902990005';
        $user->nama = 'User';
        $user->email = 'user1@localhost';
        $user->password = Hash::make('123');
        $user->no_hp = '084653695873';
        $user->jk = 'L';
        $user->no_rekening = '846278699';
        $user->bank = 'BCJ';
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
