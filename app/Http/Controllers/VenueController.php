<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Venue;
class VenueController extends Controller
{
    //
    public function list($id){
        $types=Type::all();
        $venues=Venue::where('type_id',$id)->paginate(6);
        return view('venue/list',compact('types','venues'));
    }
}
