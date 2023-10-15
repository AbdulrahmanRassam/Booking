<?php

namespace App\Http\BookingApp\Repositories;

use App\Models\Job;

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
