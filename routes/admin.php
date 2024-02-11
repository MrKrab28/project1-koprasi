<?php

use App\Http\Controllers\Admin\AngsuranController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SimpananController as AdminSimpananController;
use App\Http\Controllers\Admin\PinjamanController as AdminPinjamanController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'auth:admin', 'as' => 'admin.'], function () {
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // user controller
    Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('/user/edit/{user}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [AdminUserController::class, 'delete'])->name('user.delete');


    // simpanan Controller
    Route::get('simpanan', [AdminSimpananController::class, 'index'])->name('simpanan-user');
    Route::post('simpanan/add', [AdminSimpananController::class, 'store'])->name('simpanan-store');
    Route::post('simpanan/add-items', [AdminSimpananController::class, 'storeItem'])->name('simpanan-storeItem');


    // pinjaman
    Route::get('pinjaman', [AdminPinjamanController::class, 'index'])->name('pinjaman-user');
    Route::post('pinjaman/add', [AdminPinjamanController::class, 'store'])->name('pinjaman-store');
    Route::get('pinjaman/angsuran', [AngsuranController::class, 'index'])->name('angsuran');
    Route::post('pinjaman/angsuran', [AngsuranController::class, 'store'])->name('angsuran-store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});
