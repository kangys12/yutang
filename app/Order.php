<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $guarded=["id"];
     public function venue(){
         return $this->belongsTo('App\Venue');
     }
}
