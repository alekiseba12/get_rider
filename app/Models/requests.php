<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class requests extends Model
{
   use Notifiable;
    //to submit the request to the rider and shop/company owner

       public function routeNotificationForAfricasTalking($notification)
    {
        return $this->phone_number;
    }

    public function user(){

        return $this->belongsTo('App\User');
    }
}
