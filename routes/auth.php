<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'login'])
    ->name('Login');
Route::post('/', [UserController::class, 'loginIn'])
    ->name('LoginIn');

Route::post('/logout', [UserController::class, 'loginOut'])
    ->name('LoginOut');
