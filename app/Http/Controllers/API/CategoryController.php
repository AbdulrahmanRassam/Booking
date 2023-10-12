<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\BookingApp\Facades\CategoryFacade;
use App\Http\Requests\API\CategoryRequest;

class CategoryController extends Controller
{
    public function create(CategoryRequest $request){

       return CategoryFacade::create($request->validated()?$request->only('name',"isMain","father"):null);
    }
    public function getAll(){

       return CategoryFacade::getAll();
    }
}
