<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Venue;
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
        Venue::create($types);
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
}
