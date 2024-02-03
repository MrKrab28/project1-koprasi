<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->string('password');
            $table->timestamps();
        });

        $admin= new Admin();
        $admin->nama = 'admin';
        $admin->email = 'admin@localhost';
        $admin->password = Hash::make('123');

        $admin->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
