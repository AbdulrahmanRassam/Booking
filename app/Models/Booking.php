<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings';

    protected $fillable =[
        'user_id','room_id','check_in_at','check_out_at','status_code'
    ];

     /**
     * Get the Booking  Status associated with the Booking.
     */
    public function status()
    {
        return $this->belongsTo(Config::class,'status_code','prog_name');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }
}
