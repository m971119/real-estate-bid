<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Login Required
Route::middleware('auth')->group(function () {
    Route::delete('logout', [AuthController::class, 'destroy'])
        ->name('logout');
    Route::prefix('realtor')->name('realtor.')
        ->group(function () {
            Route::name('listing.restore')
            ->put(
                'listing/{listing}/restore',
                [RealtorListingController::class, 'restore']
            )->withTrashed();
            Route::resource('listing', RealtorListingController::class)
            ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
            ->withTrashed();
            Route::resource('listing.image', RealtorListingImageController::class)
                ->only(['create', 'store', 'destroy']);
        });
});

Route::get('/', [IndexController::class, 'index']);
Route::resource('listing', ListingController::class)
    ->only(['index', 'show']);
Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::resource('user', UserController::class)->only(['create', 'store']);
