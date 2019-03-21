<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function save(Request $request){
        //return $request;
        //$date=date('Y-m-d : H-m-s',time());

        for($i=0;$i<count($request->list);$i++){
            $order=new Order();
            $order->user_id=\Auth::id();
            $order->venue_id=$request->venue_id;
            $order->order_date=$request->order_date;
            $order->order_time=$request->list[$i]['order_time'];
            $order->field=$request->list[$i]['field'];
            $order->save();
        }
    }
}
