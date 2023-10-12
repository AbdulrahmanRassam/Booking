<?php

namespace App\Http\Controllers\API;

use App\Http\BookingApp\Facades\JobFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\JobRequest;

class JobController extends Controller
{
    public function store(JobRequest $request){

       return JobFacade::create($request->validated());
    }
    public function getAll(){

       return JobFacade::getAll();
    }
}
