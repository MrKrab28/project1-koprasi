<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AngsuranController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PemasukanController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\JenisSimpananController;
use App\Http\Controllers\Admin\PenarikanController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PetugasController as AdminPetugasController;
use App\Http\Controllers\Admin\PinjamanController as AdminPinjamanController;
use App\Http\Controllers\Admin\SimpananController as AdminSimpananController;
use App\Models\Penarikan;

// Route::group(['middleware' => 'auth:admin', 'as' => 'admin.'], function () {
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // user controller
    Route::get('/user', [AdminUserController::class, 'index'])->name('user-index');
    Route::post('/user/add', [AdminUserController::class, 'store'])->name('user-store');
    Route::get('/user/edit/{user}', [AdminUserController::class, 'edit'])->name('user-edit');
    Route::put('/user/update/{user}', [AdminUserController::class, 'update'])->name('user-update');
    Route::delete('user/{user}', [AdminUserController::class, 'delete'])->name('user-delete');


    // simpanan Controller
    Route::get('simpanan', [AdminSimpananController::class, 'index'])->name('simpanan-user');
    Route::get('simpanan/detail', [AdminSimpananController::class, 'detail'])->name('simpanan-user.detail');
    Route::post('simpanan/add', [AdminSimpananController::class, 'store'])->name('simpanan-store');
    Route::post('simpanan/add-items', [AdminSimpananController::class, 'storeItem'])->name('simpanan-storeItem');


    // pinjaman
    Route::get('pinjaman', [AdminPinjamanController::class, 'index'])->name('pinjaman-user');
    Route::post('pinjaman/add', [AdminPinjamanController::class, 'store'])->name('pinjaman-store');
    Route::get('pinjaman/angsuran', [AngsuranController::class, 'index'])->name('angsuran');
    Route::post('pinjaman/angsuran', [AngsuranController::class, 'store'])->name('angsuran-store');

    // jenis simpanan
    Route::get('jenis-simpanan', [JenisSimpananController::class, 'index'])->name('jenisSimpanan-index');
    Route::post('jenis-simpanan/add', [JenisSimpananController::class, 'store'])->name('jenisSimpanan-store');
    Route::get('jenis-simpanan/edit/{jenis}', [JenisSimpananController::class, 'edit'])->name('jenisSimpanan-edit');
    Route::put('jenis-simpanan/update/{jenis}', [JenisSimpananController::class, 'update'])->name('jenisSimpanan-update');
    Route::delete('jenis-simpanan/{jenis}', [JenisSimpananController::class, 'delete'])->name('jenisSimpanan-delete');

    // Petugas
    Route::get('petugas', [AdminPetugasController::class, 'index'])->name('petugas-index');
    Route::post('petugas/add', [AdminPetugasController::class, 'store'])->name('petugas-store');
    Route::get('petugas/edit/{petugas}', [AdminPetugasController::class, 'edit'])->name('petugas-edit');
    Route::put('petugas/update/{petugas}', [AdminPetugasController::class, 'update'])->name('petugas-update');
    Route::delete('petugas/{petugas}', [AdminPetugasController::class, 'delete'])->name('petugas-delete');

    // TRANSAKSI


    //Pemasukan
    Route::get('pemasukan', [PemasukanController::class, 'index'])->name('pemasukan-index');
    Route::post('pemasukan/add', [PemasukanController::class, 'store'])->name('pemasukan-store');
    Route::get('pemasukan/edit/{pemasukan}', [PemasukanController::class, 'edit'])->name('pemasukan-edit');
    Route::put('pemasukan/update/{pemasukan}', [PemasukanController::class, 'update'])->name('pemasukan-update');
    Route::delete('pemasukan/{pemasukan}', [PemasukanController::class, 'delete'])->name('pemasukan-delete');

    // Pengeluaran
    Route::get('pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran-index');
    Route::post('pengeluaran/add', [PengeluaranController::class, 'store'])->name('pengeluaran-store');
    Route::get('pengeluaran/edit/{pengeluaran}', [PengeluaranController::class, 'edit'])->name('pengeluaran-edit');
    Route::put('pengeluaran/update/{pengeluaran}', [PengeluaranController::class, 'update'])->name('pengeluaran-update');
    Route::delete('pengeluaran/{pengeluaran}', [PengeluaranController::class, 'delete'])->name('pengeluaran-delete');

    // PENARIKAN
    Route::get('penarikan', [PenarikanController::class, 'penarikan'])->name('penarikan');
    Route::post('penarikan/add', [PenarikanController::class, 'store'])->name('penarikan-store');

    // Auth
    Route::get('logout', [AuthController::class, 'logout'])->name('admin-logout');
});
