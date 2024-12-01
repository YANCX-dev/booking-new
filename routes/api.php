<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Route::apiResource('booking', BookingController::class); - Знаю о таком методе, но решил использовать классику
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login',    [AuthController::class,   'login'])->name('login');
    Route::post('/logout',   [AuthController::class,  'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh',  [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me',       [AuthController::class,      'me'])->middleware('auth:api')->name('me');

});

Route::middleware('auth:api')->group(function () {
    Route::get('/bookings/{id}',         [BookingController::class,        'show']);
    Route::get('/bookings',              [BookingController::class,       'index']);
    Route::post('/bookings',             [BookingController::class,       'store']);
    Route::put('/bookings/{id}',         [BookingController::class,      'update']);
    Route::delete('/bookings/{id}',      [BookingController::class,     'destroy']);
    Route::get('user/{userId}/bookings', [BookingController::class, 'userBooking']);
});

