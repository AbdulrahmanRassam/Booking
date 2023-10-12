<?php


namespace App\Http\BookingApp\Contracts;


interface CategoryContract{




     /**
      *  Store T Create.
     * @param  $request
     */
    public static function create( $request);


    /**
      * Retrieve All Available Jobs.

     */
     public static function getAll();
}

?>
