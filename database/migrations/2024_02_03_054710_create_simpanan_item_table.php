<?php

use App\Models\SimpananItem;
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
        Schema::create('simpanan_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_simpanan');
            $table->integer('jumlah_setor');
            $table->date('tgl_simpan');
            $table->timestamps();

            $table->foreign('id_simpanan')->references('id')->on('simpanan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        $simpanan = new SimpananItem();
        $simpanan->id_simpanan = 1;
        $simpanan->jumlah_setor = 52000;
        $simpanan->tgl_simpan = now();
        $simpanan->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan_item');
    }
};
