<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deliveries extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable=['user_id', 'first_name','last_name','gender','email','phone','location','product_name'];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
