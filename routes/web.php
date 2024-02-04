<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('getregister.user');
Route::post('/register', [RegisterController::class, 'store'])->name('register.user');

// Auth
Route::group(['middleware' => ['guest:admin', 'guest:anggota']], function () {
    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('authenticate');

    Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
});
