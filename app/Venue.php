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
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function isfollowed(){
        return (bool) Follow::where('user_id', \Auth::id())
            ->where('venue_id', $this->id)
            ->first();
    }
    public function prices(){
        return $this->hasMany('App\Price');
    }

}
