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
            $table->integer('total_pinjaman');
            $table->string('bunga');
            $table->date('tgl_pinjaman');
            $table->integer('jumlah_angsuran');
            $table->enum('status', ['Proses', 'Selesai'])->default('Proses');
            $table->string('keterangan');
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
        Schema::dropIfExists('pinjaman');
    }
};
