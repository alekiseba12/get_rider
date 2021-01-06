<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

      
}
