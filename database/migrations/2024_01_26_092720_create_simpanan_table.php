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
        Schema::create('simpanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->string('id_transaksi');
            $table->integer('jumlah_setor');
            $table->string('no_rekening');
            $table->integer('saldo_awal');
            $table->integer('saldo_akhir');
            $table->string('ket');
            $table->date('tgl_simpan');
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan');
    }
};
