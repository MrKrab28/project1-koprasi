<?php

use App\Models\Petugas;
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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->enum('jk', ['L', 'P'])->default('L');
            $table->string('jabatan');
            $table->string('email');
            $table->string('password');
            $table->date('tgl_bergabung');
            $table->timestamps();
        });

        $petugas = new Petugas();
        $petugas->nama = 'Joko';
        $petugas->alamat = 'Taman Sudiang Indah';
        $petugas->no_hp = '123123';
        $petugas->jabatan = 'pertokoan';
        $petugas->email = 'petugas@mail';
        $petugas->password = bcrypt('123');
        $petugas->tgl_bergabung = now();
        $petugas->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
