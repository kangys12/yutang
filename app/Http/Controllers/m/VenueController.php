<?php

namespace App\Http\Controllers\m;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venue;
class VenueController extends Controller
{
    //
    public function my_list(){
        $venues= Venue::paginate(10);
        //$res=$venues->all();
        $venues=$this->get_data($venues);
        return $venues;
    }

    public function type(){
        $types=Type::all();
        return $types;
    }
    private function get_data($res){
        foreach ($res as $venue){
            $venue['type_name']=$venue->type->name;
        }
        return $res;
    }

    public function get_type($id){
        $res=Venue::where('type_id',$id)->paginate(10);
        $res=$this->get_data($res);
        return $res;

    }
//场馆详情
    public function detail($id){

        $venue=Venue::find($id);
        $venue->type_name=$venue->type->name;
        $venue->dates=$this->get_dates();
        return $venue;
    }

    private function get_dates(){

        $arr=[];
        $week=Array('周日','周一','周二','周三','周四','周五','周六');
        for($i=0;$i<7;$i++){
            $arr[$i]['date']=date('Y-m-d',time()+24*60*60*$i);
            $day=date('w',time()+24*60*60*$i);
            $arr[$i]['week']=$week[$day];
        }
        return $arr;

    }
}
