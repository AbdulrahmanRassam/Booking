<?php

namespace App\Http\BookingApp\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepo
{
     private User $user;

    public static function create($input)
    {

            $user= User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_code'=>'RoleUserPro'
            ]);



        $response['token'] = $user->createToken('SamhToken')->accessToken;

        $response['user'] = new UserResource($user);
        $response['role'] = $user->role ;
        $response['success'] = true;
        $response['msg'] ='user Created successfully';

        return response()->json($response,200);

    }

    public static function login($request){
        // $credentials = ['email' => $request->email, 'password' => $request->password];

       if (Auth::attempt($request, false)) {

        // if(auth()->attempt($request))
        // {

            $user=Auth::user();
            $response['user'] = new UserResource($user);
            $response['msg'] ='login successfully';
            $response['success'] =true;
            $response['token'] = $user->createToken('SamhToken')->accessToken;
            return response()->json($response,200);
        }
        else{
            $response['msg'] =['Please check your Auth'];
            $response['success'] =false;
            return response()->json($response,404);

        }
    }

}
