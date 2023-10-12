<?php


namespace App\Http\BookingApp\Contracts;


interface BookingContract{

     /**
      *  Store T Create.
     * @param  $request
     */
    public static function booking( $request);

      /**
      * Get All Current User Booking or Requests.
     * @param  $id
     */
    public static function getAll( );

     /**
      * Get All Booking  Requests.
     * @param  $id
     */
    public static function getRequests( );


     /**
      *  Accept Request .
     * @param  $id
     */
    public static function acceptRequest($id);
}

?>
