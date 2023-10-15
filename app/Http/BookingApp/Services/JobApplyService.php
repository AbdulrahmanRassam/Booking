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
            $response['data'] =JobApplyResource::collection($bookings);
            $response['success'] = true;
            $response['msg'] ='Jobs Applies Retrieved successfully';
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
            $response['data'] =JobApplyResource::collection($bookings);

            $response['success'] = true;
            $response['msg'] ='Jobs Applies Retrieved successfully';
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
            $response['msg'] ='Job Request Accepted successfully';
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
            $response['msg'] ='Job Request Rejected successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
}
