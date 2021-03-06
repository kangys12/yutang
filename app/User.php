<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tel',"icon"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function venues(){
        return $this->belongsToMany('App\Venue');
    }
    public function games(){
        return $this->belongsToMany('App\Game');
    }
    public function my_create_games(){
        return $this->hasMany('App\Game');
    }
}
