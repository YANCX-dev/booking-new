<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('booking', BookingController::class); - Знаю о таком методе, но решил использовать классику

Route::get('/bookings/{id}',         [BookingController::class,        'show']);
Route::get('/bookings',              [BookingController::class,       'index']);
Route::post('/bookings',             [BookingController::class,       'store']);
Route::put('/bookings/{id}',         [BookingController::class,      'update']);
Route::delete('/bookings/{id}',      [BookingController::class,     'destroy']);
Route::get('user/{userId}/bookings', [BookingController::class, 'userBooking']);
