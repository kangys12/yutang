<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Venue;
use \App\Price;
use PhpParser\Node\Expr\Array_;

class VenueController extends Controller
{




//    private function get_time_list(){
//        $arr=[];
//        for ($i=9;$i<24;$i++){
//            $arr[$i]=$i;
//        }
//        return $arr;
//    }
//
//    private function get_date_field_list($id){
//        $venue=Venue::find($id);
//        $num=$venue->num;
//        $days=$this->get_date_list();
//        $list=[];
//        $field_arr=[];
//        for($i=1;$i<=$num;$i++){
//            $field_arr[]=$i;
//        }
//        for($i=0;$i<count($days);$i++){
//            $day=$days[$i]['date'];
//            $list[$day]=$field_arr;
//        }
//
//        $price=$this->get_time_price($id);
//        return $list;
//
//    }
//    private function get_time_price($venue_id){
//        $venue=Venue::find($venue_id);
//
//        $price=$venue->prices;
//
//        //dd($price);
//    }
//==========================================================================

    public function list($id){
        $types=Type::all();
        $venues=Venue::where('type_id',$id)->paginate(6);
        return view('venue/list',compact('types','venues'));
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

    private function get_time_list(){
        $arr=[];
        for ($i=8;$i<24;$i++){
            $arr[$i]=$i;
        }
        return $arr;
    }

//1.获取日期列表
    private function get_date_list($id)
    {
        $days=$this->get_dates();
        $arr=[];
        for($i=0;$i<count($days);$i++){
            $day=$days[$i]['date'];
            $arr[$day]=$this->get_field_list($id);
        }
        //dd($arr);
        return $arr;
    }
    //2.获取场地列表
    private function get_field_list($venue_id)
    {
        $venue=Venue::find($venue_id);
        $num=$venue->num;
        $arr=[];
        for($i=1;$i<=$num;$i++){
            $arr[$i]=$this->get_time_prices($venue_id);
        }
        return $arr;
    }
    //3.获取时间和价格列表
    private function get_time_prices($venue_id)
    {
        $venue=Venue::find($venue_id);
        $prices=$venue->prices->toArray();
        $arr=[];
        for($i=0;$i<count($prices);$i++){
            $arr[$i]['time']=$prices[$i]['time'];
            $arr[$i]['price']=$prices[$i]['price'];
        }
        return $arr;
    }
    public function detail($id)
    {
        $dates=$this->get_dates();
        $times=$this->get_time_list();
        $date_fields=$this->get_date_list($id);
        $venue = Venue::find($id);
        $types = Type::all();
        return view("venue/detail",compact("venue","types","dates","times","date_fields"));
    }


//==========================================================================
//    public function detail($id){
//
//        $dates=$this->get_date_list();
//        $times=$this->get_time_list();
//        $date_fields=$this->get_date_field_list($id);
//
//        //dd($field);
//        $venue=Venue::find($id);
//        $types=Type::all();
//        return view('venue/detail',compact('types','venue','dates','times','date_fields'));
//    }
    public function create(){

        $types = Type::all();
        return view('venue/create',compact('types'));
    }
    public function save(Request $request){
        $this->validate(request(),[
            "name"=>"required|string|min:6|max:50",
            "address"=>"required|string|min:6"
        ]);
        $types = $request->except('_token');
        $types['user_id']=\Auth::id();
        $res=Venue::create($types);
        $venue_id=$res->id;
        for($i=8;$i<24;$i++){
            $price = new Price();
            $price->venue_id=$venue_id;
            $price->time=$i;
            $price->price=80;
            $price->save();
        }
        return redirect('venue/show');
    }
    public function show(){
        $types =Venue::where('user_id',\Auth::id())->get();
        return view('venue/show',compact('types'));
    }
    public function edit($id){
        $types = Type::all();
        $venue=Venue::find($id);
        return view('venue/edit',compact('venue','types'));
    }
    public function update($id,Request $request){
        $venue=Venue::find($id);
        $data=$request->except('_token');
        $venue->update($data);
        return redirect('venue/show');
    }
    public function del($id){
        Venue::where('id',$id)->delete();
        return redirect('venue/show');
    }
    //关注
    public function follow($id){
        // 1 获取登录用户id
        // 2 获取场馆id
        // 3 将 user_id venue_id 追加到follows表;
        // 不加小括号是数据，加小括号是关联关系  --> 对象
        \Auth::user()->venues()->attach($id);
        return redirect('/home');
    }
    //取消关注
    public function unfollow($id){
        // 1 获取登录用户id
        // 2 获取场馆id
        // 3 将 user_id venue_id 追加到follows表;
        // 不加小括号是数据，加小括号是关联关系  --> 对象
        \Auth::user()->venues()->detach($id);
        return back();
    }

    public function my_follows(){
        $my_follows=\Auth::user()->venues;
        return view('user/my_follows',compact('my_follows'));
    }
}
