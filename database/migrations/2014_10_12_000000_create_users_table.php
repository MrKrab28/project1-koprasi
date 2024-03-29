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
            $table->string('email');
            $table->string('password');
            $table->string('no_hp');
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->string('foto_ktp')->default('default.png');
            $table->string('nik');
            $table->enum('level', ['admin', 'user'])->default('user');
            $table->string('no_rekening')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user->nama = 'admin';
        $user->email = 'admin@mail.com';
        $user->no_hp = '123123';
        $user->jk = 'L';
        $user->level = 'admin';
        $user->password = bcrypt('123');
        $user->nik = '7371112810990005';
        $user->no_rekening = '12312314';
        $user->save();

        $user = new User();
        $user->nama = 'imam';
        $user->email = 'imam@mail.com';
        $user->no_hp = '3456234';
        $user->jk = 'L';
        // $user ->level = 'admin';
        $user->password = bcrypt('123');
        $user->nik = '7371112810990003';
        $user->no_rekening = '123456';
        $user->save();



        $user = new User();
        $user->nama = 'ASRI';
        $user->email = 'asri@mail.com';
        $user->no_hp = '34561234';
        $user->jk = 'P';
        // $user ->level = 'admin';
        $user->password = bcrypt('123');
        $user->nik = '737111281093546003';
        $user->no_rekening = '123233456';
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
