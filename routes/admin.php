<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'auth:admin', 'as' => 'admin.'], function () {
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user', [UserController::class, 'index'])->name('index.user');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('update.user');
    Route::delete('user/{user}', [UserController::class, 'delete'])->name('delete.user');

    Route::get('simpanan', [SimpananController::class, 'index'])->name('simpanan');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
});
