<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use DB;
class AdsController extends Controller
{
    
    public function All_Ads()
    {

        $now = date('Y-m-d');
        $ads=DB::table('products')->where([
                                            ['start_offer_at', '<=', $now],
                                            ['end_offer_at', '>=', $now],
                                            ['price_offer','!=',0.00],
                                ])->get();


        return view('front_end.ads',compact('ads'));

    }

    public function new_Ads( Request $request , $id_comp)
    {
      
        $ads=DB::table('products')->where([

                                            ['id_comp','=',$id_comp],
                                            ['price_offer' ,'=', 0.00],
            
                                        ])->get();
                                        
                          
        if(!$ads->isEmpty())
        {
            return view('front_end.new_ads',compact('ads'));
            
        }else
        {
            return view('front_end.empty');

        }

    }

    public function make_new( Request $request)
    {
       
        DB::table('products')
                        ->where('id', request('id_product'))
                        ->update([
                                    'start_offer_at' => request('start_offer_at'),
                                    'price_offer' => request('price_offer'),
                                    'end_offer_at' =>  request('end_offer_at')
                                    
                                ]);

                      
                       
                       
     return back();
    }
}
