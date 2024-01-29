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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->foreignId('id_anggota');
            $table->string('no_rekening');
            $table->integer('total_pinjaman');
            $table->string('lama_pinjam');
            $table->string('bunga');
            $table->string('ket');
            $table->date('tgl_pinjaman');
            $table->date('tgl_jatuhTempo');
            $table->date('lama_angsuran');
            $table->enum('status',  ['Diterima', 'Ditolak', 'Diproses'] )->nullable();
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('no_rekening')->references('no_rekening')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // $table->foreign('id')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
