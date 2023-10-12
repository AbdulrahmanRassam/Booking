<?php

namespace App\Http\Controllers\API;

use App\Http\BookingApp\Facades\RoomFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RoomRequest;

class RoomController extends Controller
{
    public function create(RoomRequest $request){

       return RoomFacade::create($request->validated());
    }
    public function getAll(){

       return RoomFacade::getAll();
    }
}
