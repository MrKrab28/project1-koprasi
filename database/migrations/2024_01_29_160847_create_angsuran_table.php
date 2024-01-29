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
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->foreignId('id_pinjaman');
            $table->integer('angsuran_ke');
            $table->integer('sisa');
            $table->integer('jumlah_bayar');
            $table->integer('denda');
            $table->integer('total_tagihan');
            $table->timestamps();

            $table->foreign('id_pinjaman')->references('id')->on('pinjaman')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsuran');
    }
};
