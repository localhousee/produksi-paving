<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PavingController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ProduksiPavingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiBeliController;
use App\Http\Controllers\TransaksiJualController;

// https://laravel.com/docs/8.x/routing#redirect-routes
// https://laravel.com/docs/8.x/fortify
Route::redirect('/', 'login');

// https://laravel.com/docs/8.x/routing#route-group-prefixes
// https://laravel.com/docs/8.x/routing#route-group-middleware
Route::prefix('dashboard')->middleware('auth')->group(function () {
    // https://laravel.com/docs/8.x/routing#view-routes
    Route::view('/', 'dashboard');
    // https://laravel.com/docs/8.x/controllers#resource-controllers
    // https://laravel.com/docs/8.x/controllers#restful-partial-resource-routes
    Route::resource('pembeli', PembeliController::class)->except('show');
    Route::resource('supplier', SupplierController::class)->except('show');
    Route::resource('paving', PavingController::class)->except('show');
    Route::resource('bahan-baku', BahanBakuController::class)->except('show');
    Route::resource('produksi', ProduksiController::class)->except('show');
    Route::resource('transaksi-jual', TransaksiJualController::class);
    Route::resource('transaksi-beli', TransaksiBeliController::class);
    // https://laravel.com/docs/8.x/controllers#restful-nested-resources
    Route::resource('produksi.paving', ProduksiPavingController::class);
});
