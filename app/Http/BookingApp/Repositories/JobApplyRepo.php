<?php

namespace App\Http\BookingApp\Repositories;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobApplyRepo
{


    public static function create($input):JobApplication
    {

          return JobApplication::create($input);
    }

    public static function getAll()
    {
        if (Auth::user() &&  (Auth::user()->is_admin||Auth::user()->is_employee)) {

            return JobApplication::all();
        }else{

            return JobApplication::where('user_id',Auth::id())->get();
        }

    }

    /**
     * Get All Requests
     * Only Admin Can Reach this
     * **/
    public static function getRequests()
    {
      return JobApplication::where('status_code','JobStatusSubmittedPro')->get();
    }

     /**
     * Accept  Requests
     * Only Admin Can Reach this
     * **/
    public static function acceptRequest($id)
    {
        return JobApplication::where('id',$id)->update(['status_code' => 'JobStatusAcceptedPro']);
    }

      /**
     * Reject  Requests
     * Only Admin Can Reach this
     * **/
    public static function rejectRequest($id)
    {
        return JobApplication::where('id',$id)->update(['status_code' => 'JobStatusRejectedPro']);
    }

}
