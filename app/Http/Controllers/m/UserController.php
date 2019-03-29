<?php

namespace App\Http\Controllers\m;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function my_orders(){
        $user_id=Auth::id();
        $orders=Order::where('user_id',$user_id)->get();
        foreach ($orders as $k=>$order){
            $orders[$k]['venue_name']=$order->venue->name;
        }
        return $orders;
    }
    public function info(){
        // 获取当前认证用户...
        $user = \Auth::user();
// 获取当前认证用户的ID...
// 判断用户是否通过认证;
        if (\Auth::check()) {
            return $user;
            // The user is logged in...
        }else{
            return response()->json(["code"=>3000]);
        }
    }
//用户登录
    public function login(Request $request){

        $user = \request(["email","password"]);
        // 验证用户名与密码是否匹配

        // Auth::attempt($user);

        if(\Auth::guard("web")->attempt($user)){
            $user=\Auth::user();
            return response()->json(["status"=>200,'user'=>$user]);
        }else{
            return response()->json(["status"=>3000]);
        }

    }
    //上传头像
    public  function upload(Request $request){
        $file = $request->file('icon');  //获取UploadFile实例
        $path = base_path("public\\upload");
        $ext = $file->getClientOriginalExtension(); //扩展名 girl_0.jpg
        $file_name = time() . "." . $ext;    //重命名上传文件
        $res=$file->move($path, $file_name); //移动至指定目录
        return response(['code'=>'200','img_name'=>$file_name]);
    }
    public function save(Request $request){
        $data = $request->all();
        $res= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel'=>$data['tel'],
            'icon'=>$data['icon'],
            'password' => bcrypt($data['password']),
        ]);
        return $res;
    }
}
