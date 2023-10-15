<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\BookingContract;
use App\Http\BookingApp\Repositories\BookingRepo;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Auth;

 class BookingService implements BookingContract
{

     /**
      *  Create new Room.
     * @param array $request
     */
    public static function booking( $request){

        $request['status_code']='BookingStatusPendingPro';
        $booking=BookingRepo::create($request);

        if($booking){



            $response['booking'] = new BookingResource($booking);
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
        $bookings=BookingRepo::getAll();

        if($bookings){

            $response['data'] =BookingResource::collection($bookings);
            $response['success'] = true;
            $response['msg'] ='Rooms Retrieved successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
    public static function getRequests(){
        $bookings=BookingRepo::getRequests();

        if($bookings){
            $response['data'] =BookingResource::collection($bookings);

            $response['success'] = true;
            $response['msg'] ='Rooms Retrieved successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
    public static function acceptRequest($id){
        $accepted=BookingRepo::acceptRequest($id);

        if($accepted){
            $response['success'] = true;
            $response['msg'] ='Room Booked successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
}
