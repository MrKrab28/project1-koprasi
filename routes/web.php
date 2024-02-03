<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('authenticate');


// Register
Route::get('/register', [AuthController::class, 'getregister'])->name('getregister.user');
Route::post('/register', [UserController::class, 'store'])->name('register.user');

// USER
Route::get('/', [AuthController::class, 'index'])->name('dashboard')
->middleware('auth:anggota,admin');
Route::get('/user', [UserController::class, 'index'])->name('index.user')
->middleware('auth:anggota,admin');


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/user', [UserController::class, 'index'])->name('index.user');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('update.user');
    Route::delete('user/{user}', [UserController::class, 'delete'])->name('delete.user');

    Route::get('simpanan', [SimpananController::class, 'index'])->name('simpanan');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
});

Route::get('/simpanan', [UserController::class, 'getSimpanan'])->name('index.simpanan');

// Route::middleware(['auth', 'auth:anggota', 'auth:admin'])->group(function(){
//     Route::get('/', [AuthController::class, 'index'])->name('dashboard');
// });

// Route::group(['middleware' => 'auth:anggota', 'auth:admin']. function(){
//     Route::get('/', [AuthController::class, 'index'])->name('dashboard');
// });
