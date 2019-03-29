<?php

namespace App\Http\Controllers\m;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venue;
use App\Order;
use App\Type;

class OrderController extends Controller
{

    public function types(){
        $types=Type::all();
        return $types;

    }
    public function detail($id){
        $order=Order::find($id);
        $order['venue']=$order->venue;
        return $order;

    }

    public function save(Request $request){
        $params=$request->params;
        $items=$request->params['items'];
        for($i=0;$i<count($items);$i++){
            $order=new Order();
            $order->user_id=\Auth::id();
            $order->venue_id=$params['venue_id'];
            $order->order_date=$params['order_date'];
            $order->order_time=$items[$i]['time'];
            $order->field=$items[$i]['field'];
            $order->save();
        }
        return response()->json(['code'=>200]);
    }
    //
    public function times($id){
        $data=[];
        $times=[];
        for ($i=8;$i<24;$i++){
            $times[]=$i;
        }
        $data['times']= $times;
        $date_list=[];
        $days=$this->get_dates();
        for($i=0;$i<count($days);$i++){
            $day=$days[$i]['date'];
//            $order_date=$day;
            $date_list[$day]=$this->get_field_list($id,$day);
        }
        $data['date_list']=$date_list;
        $data['date']=date('Y-m-d',time()+24*60);
//        $date['date_list']=$this->get_date_list();
        return $data;
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
    //2.获取场地列表
    private function get_field_list($id,$order_date)
    {
        $venue=Venue::find($id);
        $num=$venue->num;
        $arr=[];
        for($i=1;$i<=$num;$i++){
            $field=$i;
            $arr[$i]=$this->get_time_prices($id,$order_date,$field);
        }
        return $arr;
    }
    //3.获取时间和价格列表
    private function get_time_prices($id,$order_date,$field)
    {
        $venue=Venue::find($id);
        $prices=$venue->prices->toArray();
        $arr=[];
        for($i=0;$i<count($prices);$i++){
            $order_time = $prices[$i]["time"];
            $price = $prices[$i]["price"];
            //$arr[$i]['time']=$prices[$i]['time'];
            $arr[$order_time]["price"]=$price;
            //$arr[$order_time]["is_ordered"]= $this->is_ordered($id);
            $arr[$order_time]["is_ordered"]= $this->is_ordered($id,$order_date,$field,$order_time);

            //$arr[$i]['price']=$prices[$i]['price'];
        }
        return $arr;
    }
    private function is_ordered($venue_id,$order_date,$field,$order_time){
        return (bool) Order::where("venue_id",$venue_id)
            ->where("order_date",$order_date)
            ->where("field",$field)
            ->where("order_time",$order_time)
            ->first();
    }
}
