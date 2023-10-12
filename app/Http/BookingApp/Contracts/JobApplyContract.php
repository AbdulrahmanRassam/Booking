<?php


namespace App\Http\BookingApp\Contracts;


interface JobApplyContract{

     /**
      *  Store T Create.
     * @param  $request
     */
    public static function apply( $request);

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
