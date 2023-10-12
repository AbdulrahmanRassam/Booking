<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\AuthContract;
use App\Http\BookingApp\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;

 class AuthService implements AuthContract
{

     /**
      *  register.
     * @param array $request
     */
    public static function register( $request){
           return UserRepo::create($request);
    }

     /**
      *  login .
     * @param array $request
     */
    public static function login( $request){
        return UserRepo::login($request);
    }


}
