<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mpesa_payments extends Model
{
   //Relationships

     public function user(){

        return $this->belongsTo('App\User');
    }
}
