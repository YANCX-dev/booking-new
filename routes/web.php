<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/',                   [HomeController::class, 'index'])->name('home');
Route::get('/showHotelCard/{id}', [HotelController::class, 'show'])->name('showHotelCard');
Route::get('/toBook/{id}',        [HotelController::class, 'book'])->name('bookTheNumber');
