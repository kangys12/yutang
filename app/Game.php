<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $guarded=["id"];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function venue(){
        return $this->belongsTo('App\Venue');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
