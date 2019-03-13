<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Venue;
use \App\Price;
class VenueController extends Controller
{
    public function list($id){
        $types=Type::all();
        $venues=Venue::where('type_id',$id)->paginate(6);
        return view('venue/list',compact('types','venues'));
    }
    public function detail($id){
        $venue=Venue::find($id);
        $types=Type::all();
        return view('venue/detail',compact('types','venue'));
    }
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
