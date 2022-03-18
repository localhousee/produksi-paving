<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangBeliController;
use App\Http\Controllers\KeranjangJualController;
use App\Http\Controllers\PavingController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ProduksiPavingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiBeliController;
use App\Http\Controllers\TransaksiJualController;

Route::redirect('/', 'login');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('pembeli', PembeliController::class)->except('show');
    Route::resource('supplier', SupplierController::class)->except('show');
    Route::resource('bahan-baku', BahanBakuController::class)->except('show');
    Route::resource('produksi', ProduksiController::class)->except('show');
    Route::resource('paving', PavingController::class);
    Route::resource('keranjang-jual', KeranjangJualController::class);
    Route::resource('keranjang-beli', KeranjangBeliController::class);
    Route::resource('transaksi-jual', TransaksiJualController::class)->except('update');
    Route::resource('transaksi-beli', TransaksiBeliController::class);
    Route::resource('produksi.paving', ProduksiPavingController::class);
});
