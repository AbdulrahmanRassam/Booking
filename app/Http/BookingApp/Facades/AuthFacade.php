<?php

namespace App\Http\BookingApp\Facades;
use Illuminate\Support\Facades\Facade;

/**/
 class  AuthFacade extends Facade {

    public static function getFacadeAccessor(){

        return 'AuthService';
    }

}

?>
