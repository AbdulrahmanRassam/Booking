<?php

namespace App\Http\BookingApp\Facades;
use Illuminate\Support\Facades\Facade;

/**/
 class  RoomFacade extends Facade {

    public static function getFacadeAccessor(){

        return 'RoomService';
    }

}

?>
