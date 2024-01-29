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
            $table->foreignId('id_anggota');
            $table->integer('total_pinjaman');
            $table->string('lama_pinjam');
            $table->string('bunga');
            $table->string('ket');
            $table->date('tgl_pinjaman');
            $table->enum('status',  ['Diterima', 'Ditolak', 'Diproses'] )->nullable();
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users')
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
