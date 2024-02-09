<?php

use App\Http\Controllers\User\AuthController as UserAuthController;
use Illuminate\Support\Facades\Route;



// Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
