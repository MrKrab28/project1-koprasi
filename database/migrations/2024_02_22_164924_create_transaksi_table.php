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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->foreignId('no_reff');
            $table->date('tgl_transaksi');
            $table->dateTime('tgl_input');
            $table->enum('jenis_transaksi', ['kredit', 'debit']);
            $table->integer('saldo');
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // $table->foreign('no_reff')->references('id')->on('data_akun')
            // ->onUpdate('cascade')
            // ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
