<?php

namespace App\Http\Controllers\API;

use App\Http\BookingApp\Facades\JobApplyFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\JobApplyRequest;

class JobApplyController extends Controller
{
    public function apply(JobApplyRequest $request){

       return JobApplyFacade::apply($request->validated());
    }
    public function getAll(){

       return JobApplyFacade::getAll();
    }
    public function getRequests(){

       return JobApplyFacade::getRequests();
    }
        public function accept($id){
       return JobApplyFacade::acceptRequest($id);
    }
}
