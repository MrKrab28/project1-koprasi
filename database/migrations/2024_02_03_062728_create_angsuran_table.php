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
            $table->foreignId('id_pinjaman');
            $table->integer('nominal');
            $table->integer('total_angsuran');
            $table->integer('jumlah_angsuran');
            $table->integer('angsuran ke-');
            $table->date('tanggal_angsur');
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
