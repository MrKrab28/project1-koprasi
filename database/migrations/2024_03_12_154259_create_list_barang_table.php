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
        Schema::create('list_barang', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('nama_barang');
            $table->string('pesanan');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('jumlah_harga');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_barang');
    }
};
