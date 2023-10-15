<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\JobContract;
use App\Http\BookingApp\Repositories\CategoryRepo;
use App\Http\BookingApp\Repositories\JobRepo;
use App\Http\Resources\JobResource;
use Illuminate\Support\Facades\Auth;

 class JobService implements JobContract
{

     /**
      *  Create new Job.
     * @param array $request
     */
    public static function create( $request){

        $id=CategoryRepo::getID($request['category']);
        $request['category_id']=$id??1;
        $Job=JobRepo::create($request);

        if($Job){

            $response['data'] = new JobResource($Job);

            $response['success'] = true;
            $response['msg'] ='Job Created successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);

        }

    }

    public static function getAll(){
        $Jobs=JobRepo::getAll();

        if($Jobs){

            $response['data'] =JobResource::collection($Jobs);

            $response['success'] = true;
            $response['msg'] ='Jobs Retrieved successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
}
