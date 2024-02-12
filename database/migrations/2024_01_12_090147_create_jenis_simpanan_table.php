<?php

use App\Models\JenisSimpanan;
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
        Schema::create('jenis_simpanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });

        JenisSimpanan::insert(
            [
                [
                    'nama' => 'Wajib',
                    'jumlah' => 50000,
                    'updated_at' => now(),
                    'created_at' => now(),
                ],
                [
                    'nama' => 'Sukarela',
                    'jumlah' => null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_simpanan');
    }
};
