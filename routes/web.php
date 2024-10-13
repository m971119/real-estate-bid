<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Login Required
Route::middleware('auth')->group(function () {
    Route::resource('listing', ListingController::class)
        ->except(['index', 'show']);
    Route::delete('logout', [AuthController::class, 'destroy'])
        ->name('logout');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);
Route::resource('listing', ListingController::class)
    ->only(['index', 'show']);
Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::resource('user', UserController::class)->only(['create', 'store']);
