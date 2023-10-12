<?php

namespace App\Http\Controllers\API;

use App\Http\BookingApp\Facades\AuthFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){

       return AuthFacade::register($request->validated());
    }
    public function login(LoginRequest $request){

       return AuthFacade::login($request->validated());
    }
}
