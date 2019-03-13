<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Venue;
use App\Price;
class PriceController extends Controller
{
    //
    public function set($id){
        $venue=Venue::find($id);
        $prices=$venue->prices;
        return view('price/index',compact('venue','prices'));
    }
    public function save(Request $request){
        $price=Price::find($request->id);
        $price->price=$request->price;
        $res=$price->save();
        return response()->json(['status'=>200,'res'=>$res]);
    }
}
