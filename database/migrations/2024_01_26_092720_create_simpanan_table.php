<?php

use App\Models\Simpanan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('simpanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->integer('saldo');
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        $simpanan = new Simpanan();
        $simpanan->id_anggota = 1;
        $simpanan->saldo = 1000;
        $simpanan->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanan');
    }
};
