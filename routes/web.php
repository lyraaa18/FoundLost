<?php

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
use App\Http\Controllers\BarangHilangController;
use App\Http\Controllers\LaporanBarangController;

// Barang Hilang Routes
Route::prefix('barang')->name('barang.')->group(function () {
    // Lost Items
    Route::prefix('hilang')->name('hilang.')->group(function () {
        Route::get('/', [BarangHilangController::class, 'index'])->name('index');
        Route::get('/create', [BarangHilangController::class, 'create'])->name('create');
        Route::post('/', [BarangHilangController::class, 'store'])->name('store');
        Route::get('/{barangHilang}', [BarangHilangController::class, 'show'])->name('show');
    });
    
    // Found Items
    Route::prefix('ditemukan')->name('ditemukan.')->group(function () {
        Route::get('/', [LaporanBarangController::class, 'index'])->name('index');
        Route::get('/create', [LaporanBarangController::class, 'create'])->name('create');
        Route::post('/', [LaporanBarangController::class, 'store'])->name('store');
        Route::get('/{laporanBarang}', [LaporanBarangController::class, 'show'])->name('show');
    });
});

Route::get('/', function () {
    return view('home');
});
