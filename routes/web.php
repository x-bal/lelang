<?php

use App\Http\Controllers\{BarangController, DashboardController, HistoryLelangController, LelangController, LevelController, MasyarakatController, PetugasController, UserController};
use App\Models\HistoryLelang;
use Illuminate\Support\Facades\{Route, Auth};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route Users
    Route::resource('users', UserController::class);

    // Route Level
    Route::resource('level', LevelController::class);

    // Route Petugas
    Route::resource('petugas', PetugasController::class);

    // Route Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // Route Barang
    Route::resource('barang', BarangController::class);

    // Route Lelang
    Route::post('lelang/pilih-pemenang/{lelang}', [LelangController::class, 'choose'])->name('lelang.choose');
    Route::resource('lelang', LelangController::class);

    // Route Penawaran Harga
    Route::post('lelang/ajukan', [HistoryLelangController::class, 'store'])->name('lelang.ajukan');
});
