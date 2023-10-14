<?php

namespace App\Models;

use App\Http\BookingApp\Trait\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;
    use HasPhoto;
    protected $table='rooms';

    protected $fillable =[
        'room_no','photo_path','type_code','status_code','price'
    ];


    protected $appends = [
        'photo_url',

    ];

     /**
     * Get the Room Status associated with the user.
     */
    public function status()
    {
        return $this->belongsTo(Config::class,'status_code','prog_name');//->where('father','RoomStatusPro');
    }
     /**
     * Get the Room type associated with the user.
     */
    public function type()
    {
        return $this->belongsTo(Config::class,'type_code','prog_name');//->where('father','RoomTypesPro');
    }
}
