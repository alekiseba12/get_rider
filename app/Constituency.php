<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $guarded =[];

    public function areas(){
        return $this->hasMany(Area::class);
    }
}
