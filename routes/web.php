<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\HomeController;
use App\Services\GeminiService;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| PUBLIC AI TEST ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/test-ai', function () {
    return app(GeminiService::class)
        ->generateTrip('Paris', 3, 50000, 'luxury');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    | DASHBOARD
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    | TRIP SYSTEM
    */
    Route::get('/trip', [TripController::class, 'index']);
    Route::post('/trip/store', [TripController::class, 'store']);
    Route::get('/my-trips', [TripController::class, 'myTrips']);
    Route::get('/trip/download/{id}', [TripController::class, 'download']);

    /*
    | PROFILE
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';