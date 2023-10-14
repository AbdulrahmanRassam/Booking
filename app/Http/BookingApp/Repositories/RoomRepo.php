<?php

namespace App\Http\BookingApp\Repositories;

use App\Http\Resources\UserResource;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoomRepo
{
     private Room $room;

    public static function create($input):Room
    {

          return Room::create([
            'room_no'=>$input['room_no'],
            'price'=>$input['price'],
            'type_code'=>$input['type'],
            'status_code'=>'RoomStatusAvailablePro',
          ]);
    }


    public static function getAll()
    {
      return Room::where('status_code','!=','RoomStatusBookedPro')->latest()->get();
    }

}
