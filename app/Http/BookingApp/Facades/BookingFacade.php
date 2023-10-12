<?php

namespace App\Http\BookingApp\Facades;
use Illuminate\Support\Facades\Facade;

/**/
 class  BookingFacade extends Facade {

    public static function getFacadeAccessor(){

        return 'BookingService';
    }

}

?>
