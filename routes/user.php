<?php

use App\Http\Controllers\User\PinjamanController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\SimpananController;
use Illuminate\Support\Facades\Route;



// Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');




Route::get('user/dashboard', [UserAuthController::class, 'dashboard'])->name('user-dashboard')->middleware('auth:anggota');
Route::group(['middleware' =>  'auth:anggota'], function () {

    Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user-logout');




    Route::get('pinjaman', [PinjamanController::class, 'dataPinjaman'])->name('user-pinjaman');

    Route::get('simpanan', [SimpananController::class, 'dataSimpanan'])->name('user-simpanan');
});
