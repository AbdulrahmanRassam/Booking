<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\RoomContract;
use App\Http\BookingApp\Repositories\RoomRepo;
use App\Http\Resources\RoomResource;
use Illuminate\Support\Facades\Auth;

 class RoomService implements RoomContract
{

     /**
      *  Create new Room.
     * @param array $request
     */
    public static function create( $request){

        $room=RoomRepo::create($request);

        if($room){

            $response['room'] = new RoomResource($room);

            $response['success'] = true;
            $response['msg'] ='Room Created successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);

        }

    }

    public static function getAll(){
        $rooms=RoomRepo::getAll();

        if($rooms){

            // $response['room'] = new RoomResource($rooms);
            $response['room'] =$rooms;

            $response['success'] = true;
            $response['msg'] ='Rooms Retrieved successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
}
