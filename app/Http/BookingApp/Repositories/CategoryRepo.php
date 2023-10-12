<?php

namespace App\Http\BookingApp\Repositories;

use App\Models\Category;


class CategoryRepo
{


    public static function create($input):Category
    {
          return Category::create($input);
    }

    public static function getAll()
    {
      return Category::where('status',true)->get();
    }

}
