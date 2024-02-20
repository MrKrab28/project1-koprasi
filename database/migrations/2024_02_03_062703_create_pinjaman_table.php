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
            // $table->string('id_pinjaman');
            $table->foreignId('id_anggota');
            $table->integer('total_pinjaman');
            $table->integer('banyak_angsuran');
            $table->integer('nominal_angsuran');
            $table->date('tgl_pinjaman');
            $table->date('jatuh_tempo');
            $table->integer('denda');
            $table->float('bunga');
            // $table->enum('status', ['Proses', 'Selesai'])->default('Proses');
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
