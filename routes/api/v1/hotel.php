<?php

use Illuminate\Support\Facades\Route;

    Route::group(
        [
            'middleware' => ['isEmployee','auth:api'],
        ], function(){
            Route::post('/add-room', [\App\Http\Controllers\API\RoomController::class, 'create'])->name('add-room');
            Route::get('/booking-requests', [\App\Http\Controllers\API\BookingController::class, 'getRequests'])->name('booking-requests');
            Route::post('/accept-request/{id}', [\App\Http\Controllers\API\BookingController::class, 'accept'])->name('accept-request');

            Route::post('/add-job', [\App\Http\Controllers\API\JobController::class, 'create'])->name('add-job');
    });
    Route::group(
        [
            'middleware' => ['auth:api'],
        ], function(){
            Route::post('/add-booking', [\App\Http\Controllers\API\BookingController::class, 'store'])->name('add-booking');
            Route::get('/bookings', [\App\Http\Controllers\API\BookingController::class, 'getAll'])->name('bookings');
    });

Route::get('/rooms', [\App\Http\Controllers\API\RoomController::class, 'getAll'])->name('rooms');
