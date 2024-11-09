<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProvedoresController;
use App\Http\Controllers\UserController;
use App\Models\Invoices;
use Illuminate\Support\Facades\Route;


Route::get('/contabilidad', function () {
    return view('index');
})->name('INICIO')
    ->middleware('auth_custom');

Route::prefix('contabilidad')->group(function () {
    Route::prefix('facturas')->controller(InvoicesController::class)->group(function () {
        Route::get('crear', 'create')->middleware('permission:create invoices')->name('invoices.create');
        Route::get('', 'index')->middleware('permission:show invoices')->name('invoices.index');
    });

    Route::prefix('catalogos')->group(function () {
        Route::prefix('proveedores')->controller(ProvedoresController::class)->group(function () {
            Route::get('craer', 'create')->middleware('permission:create suppliers')->name('provedores.create');
            Route::get('', 'index')->middleware('permission:show suppliers')->name('provedores.index');
        });
    });
});

require __DIR__ . '/auth.php';
