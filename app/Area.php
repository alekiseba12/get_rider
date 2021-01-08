<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function constituency(){
        return $this->belongsTo(Constituency::class);
    }
}
