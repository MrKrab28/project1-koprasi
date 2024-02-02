<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('admin.dashboard')->name('dashboard');
// });

Route::get('/', [AuthController::class, 'index'])->middleware('auth')->name('dashboard');
// Auth
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user')->middleware('auth');
// Register
Route::get('/register', [AuthController::class, 'getregister'])->name('getregister.user');
Route::post('/register', [UserController::class, 'store'])->name('register.user');

Route::get('/user', function(){
    return view('admin.anggota');
})->name('anggota');

// USER
Route::get('/user', [UserController::class, 'index'])->name('index.user')->middleware('auth');
Route::get('/user/edit/{user}', [UserController::class, 'edit'] )->name('edit.user');
Route::put('/user/update/{user}', [UserController::class, 'update'] )->name('update.user');
Route::delete('user/{user}',[UserController::class, 'delete'])->name('delete.user');
