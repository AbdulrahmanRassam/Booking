<?php

namespace App\Http\BookingApp\Services;
use App\Http\BookingApp\Contracts\CategoryContract;
use App\Http\BookingApp\Repositories\CategoryRepo;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Auth;

 class CategoryService implements CategoryContract
{

     /**
      *  Create new Category.
     * @param array $request
     */
    public static function create( $request){

        $Category=CategoryRepo::create($request);

        if($Category){

            $response['Category'] = new CategoryResource($Category);

            $response['success'] = true;
            $response['msg'] ='Category Created successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);

        }

    }

    public static function getAll(){
        $Categorys=CategoryRepo::getAll();

        if($Categorys){

            $response['Categorys'] =CategoryResource::collection($Categorys);

            $response['success'] = true;
            $response['msg'] ='Categorys Retrieved successfully';
            return response()->json($response,200);
        }else{
            $response['success'] = false;
            $response['msg'] ='There is an Error';
            return response()->json($response,404);
        }
    }
}
