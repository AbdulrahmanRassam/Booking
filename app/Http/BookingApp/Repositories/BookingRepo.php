<?php

namespace App\Http\BookingApp\Repositories;

use App\Http\Resources\UserResource;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BookingRepo
{
    //  private Booking $Booking;

    public static function create($input):Booking
    {

          return Booking::create($input);
    }

    public static function getAll()
    {
        if (Auth::user() &&  (Auth::user()->is_admin||Auth::user()->is_employee)) {

            return Booking::all();
        }else{

            return Booking::where('user_id',Auth::id())->get();
        }

    }
    public static function getRequests()
    {
      return Booking::where('status_code','BookingStatusPendingPro')->get();
    }
    public static function acceptRequest($id)
    {
        return Booking::where('id',$id)->update(['status_code' => 'BookingStatusApprovedPro']);
    }
    public static function rejectRequest($id)
    {
        return Booking::where('id',$id)->update(['status_code' => 'BookingStatusRejectedPro']);
    }

}
