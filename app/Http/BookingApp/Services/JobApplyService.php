<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\JobApplyContract;
use App\Http\BookingApp\Repositories\JobApplyRepo;
use App\Http\Resources\JobApplyResource;
use Illuminate\Support\Facades\Auth;

 class JobApplyService implements JobApplyContract
{

     /**
      *  Create new Room.
     * @param array $request
     */
    public static function apply( $request){

        $request['status_code']='JobStatusSubmittedPro';
        $booking=JobApplyRepo::create($request);

        if($booking){

            $response['booking'] = new JobApplyResource($booking);
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
        $bookings=JobApplyRepo::getAll();

        if($bookings){
            // $response['room'] = new JobApplyResource($bookings);
            $response['room'] =$bookings;
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
        $bookings=JobApplyRepo::getRequests();

        if($bookings){
            $response['bookings'] =JobApplyResource::collection($bookings);
            // $response['bookingsX'] =$bookings;
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
        $accepted=JobApplyRepo::acceptRequest($id);

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
    public static function rejectRequest($id){
        $rejected=JobApplyRepo::rejectRequest($id);

        if($rejected){
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
