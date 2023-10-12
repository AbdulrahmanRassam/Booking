<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table='jobs';

    protected $fillable =[
        'title','content','category_id','salary','city','status','expire_on'
    ];

     /**
     * Get the Role associated with the user.
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
