<?php

use App\Http\Controllers\Commercial\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(
    [
        'middleware' => ['isEmployee','auth:api'],
    ], function(){

        Route::post('/add-job', [\App\Http\Controllers\API\JobController::class, 'store'])->name('add-job');
        Route::get('/jobs', [\App\Http\Controllers\API\JobController::class, 'getAll'])->name('jobs');

        Route::post('/job-apply', [\App\Http\Controllers\API\JobApplyController::class, 'apply'])->name('job-apply');
        Route::get('/jobs-applied', [\App\Http\Controllers\API\JobApplyController::class, 'getAll'])->name('jobs-applied');
});
