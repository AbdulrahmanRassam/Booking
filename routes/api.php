<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController as Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->middleware([
        // 'auth:api'
    ])->group(function (){

        \App\Helper\Route\RouteHelper::includeRouteFiles(__DIR__ .'/api/v1');
    });

Route::post('/register',[Auth::class,'register'])->name('register');
Route::post('/login', [Auth::class,'login'])->name('login');
