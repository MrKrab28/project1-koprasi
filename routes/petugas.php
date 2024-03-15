<?php

use App\Http\Controllers\Petugas\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group(['middleware' => 'auth:petugas'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('petugas-dashboard');
});
