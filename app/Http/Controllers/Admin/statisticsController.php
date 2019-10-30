<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\head_billpru;
use DB;
class statisticsController extends Controller
{
    

    public function index()
    {
        if(auth()->guard('admin')->check() && (admin()->user()->type=='admin'||admin()->user()->type=='company'))
        {
            $pharm_count=DB::table('pharm_infos')->count();
            $comp_count=DB::table('comp_infos')->count();
            $order_count=DB::table('head_billprus')->count();
           
           $statistics = array(
               
                        'pharm_count'=>$pharm_count,
                        'comp_count' => $comp_count,
                        'order_count' => $order_count,
           
                        );

            return view('admin.home', compact('statistics'));
        }
        else 
        {
    
            return redirect('home');
        }
    }

}
