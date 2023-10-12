<?php

namespace App\Http\BookingApp\Repositories;

use App\Http\Resources\UserResource;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JobRepo
{
     private Job $Job;

    public static function create($input):Job
    {
          return Job::create($input);
    }

    public static function getAll()
    {
      return Job::where('status',true)->get();
    }

}
