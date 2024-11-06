<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Login Required
Route::middleware('auth')->group(function () {
    Route::delete('logout', [AuthController::class, 'destroy'])
        ->name('logout');
    Route::resource('listing.offer', ListingOfferController::class)
        ->only(['store']);
    Route::resource('notification', NotificationController::class)
        ->only(['index']);
    Route::put('notification/{notification}/seen',NotificationSeenController::class)
        ->middleware('auth')->name('notification.seen');
    // Realtor Controller
    Route::prefix('realtor')->name('realtor.')
        ->group(function () {
            Route::name('listing.restore')
                ->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])
                ->withTrashed();
            Route::resource('listing', RealtorListingController::class)
                ->withTrashed();
            Route::resource('listing.image', RealtorListingImageController::class)
                ->only(['create', 'store', 'destroy']);
            Route::name('offer.accept')
                ->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);
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
