<?php

namespace App\Http\Controllers\API;

use App\Http\BookingApp\Facades\BookingFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookingRequest;

class BookingController extends Controller
{
    public function store(BookingRequest $request){

       return BookingFacade::booking($request->validated());
    }
    public function getAll(){

       return BookingFacade::getAll();
    }
    public function getRequests(){

       return BookingFacade::getRequests();
    }
        public function accept($id){
       return BookingFacade::acceptRequest($id);
    }
        public function reject($id){
       return BookingFacade::rejectRequest($id);
    }
}
