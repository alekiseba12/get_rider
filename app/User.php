<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected static $kilometers = true;                                              
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'firstname',
        'lastname',
        'gender',
        'phone_number',
        'national_id',
        'location',
        'constituency',
        'role',
        'description',
        'latitude',
        'longitude',
        'status'
       
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function is_admin(){
        if($this->role==1){
            return true;
        }
    }
     public function is_user(){
        if($this->role==2){
            return true;
        }

    }
    public function is_treasure(){
        if($this->role==3){
            return true;
        }
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
      public function routeNotificationForAfricasTalking($notification)
    {
        return $this->phone_number;
    }

        public function riders(){

        return $this->hasMany('App\Models\requests','seller_id', 'id');
    }

    public function deliveries(){

        return $this->hasMany('App\Models\deliveries','user_id', 'id');
    }
}
