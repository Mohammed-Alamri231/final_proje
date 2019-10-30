<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\distance;
use App\weight;
use DB;

class serviceController extends Controller
{
    
    public function index()
    {
        //with(['distances','weights'])->get();
        $distances = distance::all();
        $weights = weight::all();
        
       return view('front_end.service',compact('distances','weights'));

    }
}
