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
        Schema::create('data_akun', function (Blueprint $table) {
            $table->integer('no_reff')->primary();
            // $table->foreignId('id_anggota');
            $table->string('nama_reff');
            $table->string('keterangan');
            $table->date('tgl_daftarAkun');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_akun');
    }
};
