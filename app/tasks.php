<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tasks extends Model
{

	use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps=false;

    protected $fillable = [
        'name', 'email', 'task','created_at'
    ];
}
