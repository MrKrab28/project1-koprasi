<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('user.getregister');
Route::post('/register', [RegisterController::class, 'store'])->name('user.register');

Route::get('/', function () {
    return view('layout');
    // return redirect()->route('user.login');
});

Route::get('login', function () {
    return view('login');
    // return redirect()->route('user.login');
});

Route::get('user/dashboard', [UserAuthController::class, 'dashboard'])->name('user.dashboard')->middleware('auth:anggota');
// Auth
Route::group(['middleware' => ['guest:admin', 'guest:anggota']], function () {
    // Auth User
    Route::get('user/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('user/login', [UserAuthController::class, 'authenticate'])->name('user.authenticate');


    // Auth Admin
    Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
});
