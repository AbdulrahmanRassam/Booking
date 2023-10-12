<?php


namespace App\Http\BookingApp\Contracts;


interface AuthContract{


     /**
      *  Store T Create.
     * @param  $request
     */
    public static function register( $request);

     /**
      *  Store T Create.
     * @param  $request
     */
    public static function login( $request);
}

?>
