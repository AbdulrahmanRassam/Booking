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


        $request['type']=$request['type']=='Available'?'RoomTypeSinglePro':($request['type']=='Double'?'RoomTypeDoublePro':'RoomTypeSuitePro');
        $room=RoomRepo::create($request);
        $room->photo_path='https://source.unsplash.com/random/?sig=room'. $room->id;
        $room->save();

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

            $response['data'] =RoomResource::collection($rooms);
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
