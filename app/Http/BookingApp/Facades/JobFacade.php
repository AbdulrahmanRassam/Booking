<?php

namespace App\Http\BookingApp\Facades;
use Illuminate\Support\Facades\Facade;

/**/
 class  JobFacade extends Facade {

    public static function getFacadeAccessor(){

        return 'JobService';
    }

}

?>
