<?php

namespace App\Http\Controllers\m;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //
    public function save(Request $request){
//        return $request;
//
        $request['user_id']=Auth::id();
        $game=$request->toArray();
        Game::create($game);

    }
    public function dates(){

        $arr=[];
        $week=Array('周日','周一','周二','周三','周四','周五','周六');
        for($i=0;$i<7;$i++){
            $arr[$i]['date']=date('m-d',time()+24*60*60*$i);
            $day=date('w',time()+24*60*60*$i);
            $date=date('Y-m-d',time()+24*60*60*$i);

            $arr[$i]['week']=$week[$day];
            $arr[$i]['list']=$this->get_list($date);

        }
        return $arr;

    }
    private function get_list($date){

        $games=Game::all();
        $list=[];
        foreach ($games as $k=>$game){
            $arr=$game->game_date;
            $arr=explode(' ',$arr);
            if ($date==$arr[0]){
                $list[]= $game;
            }
        }
        return $list;
    }

}
