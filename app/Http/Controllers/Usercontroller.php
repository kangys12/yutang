<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Usercontroller extends Controller
{
    //
    public function set(){
        return view('user/index');
    }
    public function bao(Request $request){
        $path=base_path("public\upload\\");
        $old_icon = $path.\Auth::user()->icon;
        $exist = \Auth::user()->icon;  // 原头像是否存在
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效
                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //重命名
                $res=$file->move($path, $file_name); //移动至指定目录
                // 保存新图
                $user=User::find(\Auth::id());
                $user->icon= $file_name;
                $user->save();
                // 删除原图
                if($exist){
                    unlink($old_icon);
                }
            }
        }
        return redirect("photo/set");
    }
}
