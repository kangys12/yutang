<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Venue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::all();
        $venues=Venue::paginate(6);
        return view('/venue/list',compact('types','venues'));
    }
}
