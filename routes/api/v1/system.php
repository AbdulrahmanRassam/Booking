<?php

use App\Http\Controllers\Commercial\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(
    [
        'middleware' => ['isEmployee','auth:api'],
    ], function(){

        Route::post('/add-category', [\App\Http\Controllers\API\CategoryController::class, 'create'])->name('add-job');
        Route::get('/categories', [\App\Http\Controllers\API\CategoryController::class, 'getAll'])->name('categories');
});
