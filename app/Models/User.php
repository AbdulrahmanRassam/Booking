<?php

namespace App\Models;

use App\Http\BookingApp\Trait\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasPhoto;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     protected $appends = [
        'photo_url',

    ];

     /**
     * Get the Role associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Config::class,'role_code','prog_name');
    }

     /**
     * Get the user's first name.
     *

     * @return true
     */
    public function getIsAdminAttribute()
    {
        return $this->role_code =='RoleAdminPro';

    }
     /**
     * Get the user's first name.
     *

     * @return true
     */
    public function getIsEmployeeAttribute()
    {
        return $this->role_code =='RoleEmployeePro';
    }

}
