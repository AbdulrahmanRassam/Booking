<?php

namespace App\Http\BookingApp\Facades;
use Illuminate\Support\Facades\Facade;

/**/
 class  JobApplyFacade extends Facade {

    public static function getFacadeAccessor(){

        return 'JobApplyService';
    }

}

?>
