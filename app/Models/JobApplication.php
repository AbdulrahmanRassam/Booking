<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table='job_applications';

    protected $fillable =[
        'user_id','job_id','user_info','status_code'
    ];


     /**
     * Get the Job Request Status associated with the user.
     */
    public function status()
    {
        return $this->belongsTo(Config::class,'status_code','prog_name');
    }
}
