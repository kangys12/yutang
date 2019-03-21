<?php

namespace App\Http\Controllers\m;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    //
    public function save(Request $request){
        $data = $request->all();
        $res= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel'=>$data['tel'],
            'password' => bcrypt($data['password']),
        ]);
        return $res;
    }
}
