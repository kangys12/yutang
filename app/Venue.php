<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //
    protected $guarded=["id"];

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
