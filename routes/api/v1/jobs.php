<?php

use App\Http\Controllers\Commercial\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(
    [
        'middleware' => ['isEmployee','auth:api'],
    ], function(){

        Route::post('/add-job', [\App\Http\Controllers\API\JobController::class, 'store'])->name('add-job');

        // Route::get('/jobs-applied', [\App\Http\Controllers\API\JobApplyController::class, 'getAll'])->name('jobs-applied');
        Route::post('/accept-job-request/{id}', [\App\Http\Controllers\API\JobApplyController::class, 'accept'])->name('accept-job-request');
        Route::post('/reject-job-request/{id}', [\App\Http\Controllers\API\JobApplyController::class, 'reject'])->name('reject-job-request');

    });

Route::group(
    [
        'middleware' => ['auth:api'],
    ], function(){

        Route::post('/job-apply', [\App\Http\Controllers\API\JobApplyController::class, 'apply'])->name('job-apply');
        Route::get('/jobs-applied', [\App\Http\Controllers\API\JobApplyController::class, 'getAll'])->name('jobs-applied');

    });

    Route::get('/jobs', [\App\Http\Controllers\API\JobController::class, 'getAll'])->name('jobs');

