<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\head_billpru;
use App\details_billpru;
use App\head_billsell;
use App\details_billsell;
use App\benefit;
use DB;
use App\Model\product;
// use App\Notifications\Pharmnotify;
use App\Notifications\Orders;
use App\Notifications\Pharmnotify;
use Illuminate\Notifications\Notification;
use App\Admin;
use App\delivery_bill;

use Illuminate\Support\Facades\Mail;

class checkoutController extends Controller
{
    public function doCheckout(Request $request)
    {
        /************* ****************/

        $this->validate(request(),[
                                    'username'=>'required',
                                    'email'=>'required', 
                                    'firstName'=>'required',
                                    'lastName'=>'required',
                                    'phone'=>'required',
                                    'distance'=>'required' 
                                     

                                    ]);
        if (auth()->guard('admin')->check() && admin()->user()->type == 'pharmacy') {
           
            $total_own_web_cust = 0;
            $all_weights=0;
            $cust_delivery=0;
            $email = request('email');
            $user_name = request('username');

            $id_pharm = DB::table('pharm_infos')->where([
                ['pharm_email', '=', $email],
                ['pharm_name', '=', $user_name]

            ])->value('id');

            $count = request('count_pro');


            $check_order = request('id_product' . '1');

            if (!empty($check_order)) {


                $new_billpru = new head_billpru;

                $new_billpru->id_pharm = $id_pharm;

                $new_billpru->pharm_name = request('username');

                $new_billpru->email = request('email');

                $new_billpru->totale = 0;
                /** or =0 */

                $new_billpru->save();


                $id_billpru = DB::table('head_billprus')->max('id_billpru');

                if ($id_billpru != null) {
                    /** do function  details_billpru */


                    for ($i = 1; $i <= $count; $i++) {


                        $new_Dbillpru = new details_billpru;

                        $new_Dbillpru->id_billpru = $id_billpru;

                        $id_pro = "id_product" . $i;

                        $new_Dbillpru->id_product = request('id_product' . $i);

                        $new_Dbillpru->name_pro = request('name_pro' . $i);

                        $new_Dbillpru->quantity = request('quantity' . $i);

                        $new_Dbillpru->id_comp = request('id_comp' . $i);

                        $new_Dbillpru->price = request('total' . $i);

                        $new_Dbillpru->save();
                        /************* ****************/


                        /************* ****************/


                        $id_comp = request('id_comp' . $i);
                        $created_at = DB::table('head_billprus')->where([
                            ['id_billpru', '=', $id_billpru],
                            ['id_pharm', '=', $id_pharm]

                        ])
                            ->value('created_at');

                        $id_billsell = DB::table('head_billsells')->where([
                            ['email', '=', $email],
                            ['id_comp', '=', $id_comp],
                            ['no_pharm', '=', $id_pharm],
                            ['created_at', '>=', $created_at]
                        ])
                            ->value('id_bill');


                        if ($id_billsell != null) {


                            $new_Dbillsell = new details_billsell;

                            $new_Dbillsell->id_billsell = $id_billsell;

                            $new_Dbillsell->id_product = request('id_product' . $i);

                            $new_Dbillsell->name_pro = request('name_pro' . $i);

                            $new_Dbillsell->quantity = request('quantity' . $i);

                            $total = request('total' . $i);

                            $own_web_cust = $total * (2 / 100);

                            $new_Dbillsell->orignal_price = request('total' . $i);

                            $new_Dbillsell->price = $total - $own_web_cust;

                            $new_Dbillsell->date_end = request('date_end' . $i);

                            $new_Dbillsell->save();


                        }// end if bill sell not empty
                        else {

                            /************* ****************/


                            $new_billsell = new head_billsell;

                            $new_billsell->no_pharm = $id_pharm;

                            $new_billsell->id_comp = request('id_comp' . $i);

                            $new_billsell->email = request('email');

                            $new_billsell->id_billpru = $id_billpru;

                            $new_billsell->totale = 0;
                            /** or =0 */

                            $new_billsell->save();
                            /************* ****************/

                            $id_billsell = DB::table('head_billsells')->max('id_bill');
                            // or this
                            /*  $id_billsell = DB::table('head_billsells')->where([
                                                                                  ['email' ,'=',$email],
                                                                                  ['id_comp','=',$id_comp ],
                                                                                  ['id_pharm','=',$id_pharm],
                                                                                  ['created_at','<=',$created_at]
                                                                          ])
                                                                          ->value('id_billsell');

                           */
                            /************* ****************/


                            $new_Dbillsell = new details_billsell;

                            $new_Dbillsell->id_billsell = $id_billsell;

                            $new_Dbillsell->id_product = request('id_product' . $i);

                            $new_Dbillsell->name_pro = request('name_pro' . $i);

                            $new_Dbillsell->quantity = request('quantity' . $i);

                            $total = request('total' . $i);

                            $own_web_cust = $total * (2 / 100);

                            $new_Dbillsell->orignal_price = request('total' . $i);

                            $new_Dbillsell->price = $total - $own_web_cust;

                            $new_Dbillsell->date_end = request('date_end' . $i);

                            $new_Dbillsell->save();

                            /************* ****************/

                        } // end else the empty bill sell
                        /************* ****************/

                        $totale_product = request('total' . $i);

                        $total_own_web_cust += $totale_product * (2 / 100);

                        $weight = request('weight'.$i)*request('quantity' . $i);

                        // updat the heads of all bills

                        $total_of_bill = DB::table('head_billprus')->where([
                            ['id_billpru', '=', $id_billpru]
                        ])
                            ->value('totale');

                        $last_totalpru = $total_of_bill + $totale_product;

                        DB::table('head_billprus')
                            ->where('id_billpru', $id_billpru)
                            ->update(['totale' => $last_totalpru]);

                        $total_of_billsell = DB::table('head_billsells')->where([
                            ['id_bill', '=', $id_billsell]
                        ])
                            ->value('totale');

                        $last_total_sell = $total_of_billsell + $totale_product;
                        DB::table('head_billsells')
                            ->where('id_bill', $id_billsell)
                            ->update(['totale' => $last_total_sell]);

                        /************* ****************/

                        $id_product = request('id_product' . $i);
                        $id_stock = request('id_stock' . $i);


                        $quantity_need = request('quantity' . $i);
                        $quantity_in = request('all_quantity' . $i);


                        $quantity_stor = $quantity_in - $quantity_need;

                        DB::table('products')->where('id', $id_product)->update(['quantity' => $quantity_stor]);

                        /************* ****************/
                        
                        $all_weights += $weight;
                        // return dd($all_weights);
                    }   /////////////////////////////////////  end for


                    /************* ****************/
                    $new_benefit = new benefit;

                    $new_benefit->id_pharm = $id_pharm;

                    $new_benefit->price = $total_own_web_cust;

                    $new_benefit->save();

                    $admin = Admin::all()->where('type', 'admin');
                    // $admin= admin()->user()->type=='admin';
                    
                    // $id_billpru = DB::table('head_billprus')->max('id_billpru');
                    \Notification::send($admin, new Orders($id_billpru));
                    session()->flash('success', trans('admin.record_added'));


                    // $email = $email;

                    // $messageData = [
                    //     'email' => $email,

                    //     'order_id' => $id_billpru,
                    // ];

                    // Mail::send('admin.emails.order', $messageData, function ($message) use ($email) {
                    //     $message->to($email)->subject('Medicens STORE');
                    // });
                    // $id_pharm = request('id_pharm');
                    // $id_billpru = request('id_bill');
                   // $email=request('email');
                    // return dd ($id_billpru);
                    $content_pru = DB::table('details_billprus')->where([
                                                                            
                                                                            ['id_billpru' , $id_billpru]
                                                                        
                                                                            
                                                                            ])->get();
                    
                        //   return dd($content_pru);                                           
                    $total_peu = DB::table('head_billprus')->where([
                                                                                                                        
                                                                    ['id_billpru' , $id_billpru],
                                                                    ['id_pharm' , $id_pharm]
                                                                
                                                                    ])->value('totale');
            
            
            
                 
                     $email=(admin()->user()->email);
            
                     $messageData = [
                        'email' => $email,
                        'name_pro'=> $content_pru
                     
                    ];
            
                   
            
                    Mail::send('admin.emails.order_update', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Medicens STORE');
                    });             
                    
                    // $id_billpru=62;
                    // $id_pharm=1;
                    
                    //value('id_comp')
                    $id_comps = DB::table('head_billsells')->where([
                                                                                                                        
                                                                    ['id_billpru' , $id_billpru],
                                                                    ['no_pharm' , $id_pharm]
                                                                
                                                                    ])->get();
            
                      // return dd($id_comps);                                         
                    foreach($id_comps as $id)
                    {
                        
                    $id_company=$id->id_comp;
                         
                    
                   // return dd($id_company); 
            
                    $id_billsell = DB::table('head_billsells')->where([
                                                                                                                    
                                                                        ['id_billpru' , $id_billpru],
                                                                        ['no_pharm' , $id_pharm],
                                                                        ['id_comp' , $id_company]
            
                                                                        ])->value('id_bill');
                    //  return dd($id_billsell); 
                                                                  
                    $email_comp = DB::table('comp_infos')->where([
                                                                                                                        
                                                                       
                                                                        ['company_id' , $id_company]
                                                                    
                                                                        ])->value('company_email');
                    
                    
            
                      // return dd($email_comp); 
                                                               
                    $total_sell = DB::table('head_billsells')->where([
                                                                                                                        
                                                                            ['id_bill' , $id_billsell],
                                                                            ['no_pharm' , $id_pharm],
                                                                            ['id_comp' , $id_company]
            
                                                                            ])->value('totale');
                    
                    // return dd($total_sell); 
            
                    $content_sell = DB::table('details_billsells')->where([
                                                                            
                                                                            ['id_billsell' , $id_billsell]
                                                                        
                                                                            
                                                                            ])->get();
            
                     $email=$email_comp;
                 
            
                    $messageData = [
                        'email' => $email,
                        'name_pro'=> $content_sell
                     
            
            
            
                    ];
                    //return dd($messageData);
            
                    Mail::send('admin.emails.order_update', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Medicens STORE');
                    });  
                     
                    # code...
                   }

                    // $email =$email;

                    // $messageData=[
                    //     'email' => $email,

                    //     'order_id' =>$id_billpru,
                    // ];

                    // Mail::send('admin.emails.order',$messageData,function($message)use($email){
                    //     $message->to($email)->subject('Medicens STORE');
                    // });

                    // auth()->user()->notify(new Pharmnotify());
                    /************* ****************/
                    // return dd($all_weights);
                    if ($request->has("paymentMethod")) {
                        $price_wei = DB::table('weights')
                            ->where([
                                ['from_is', '<=', $all_weights],
                                ['to_is', '>=', $all_weights]
                            ])->value('price');

                        // return dd($price_wei);

                        $distance=request('distance');

                        $price_dis = DB::table('distances')
                            ->where([
                                ['start_at', '<=', $distance],
                                ['end_at', '>=', $distance]
                            ])->value('price');

                            $cust_delivery = $price_wei + $price_dis;
                            
                          
                        $new_delivery = new delivery_bill;

                        $new_delivery->id_pharm = $id_pharm;
//   return dd($cust_delivery);

                        $new_delivery->price = $cust_delivery;

                        $new_delivery->save();
                    } // end if deliverl
                    /************* ****************/


                    session()->forget('cart');
                    session()->flash('success', trans('admin.order_added'));
                    return back();
                }//end if the bill purcheas not null
            }//end if the stock empty

            else {
                session()->flash('error', trans('admin.order_empty'));
                return back();
            }
        }//end if the car empty
        else {
            session()->flash('error', trans('admin.order_added12345'));
            return back();
        }
    }// end fuuction

    public function head_billpru(Request $request)
    {

        $this->validate(request(),[
            'username'=>'required',/** user name */
            'email'=>'required', /** email */
            'id_pharm'=>'required' /** from hidden input */

             ]);

            $new_billpru = new head_billpru;

            $new_billpru->id_pharm =$id_pharm;

            $new_billpru->pharm_name = request('username');

            $new_billpru->email = request('email');

            $new_billpru->totale = request('totale');/** or =0 */

            $new_billpru->save();

    }

    public function details_billpru(Request $request)
    {

        $this->validate(request(),[

            'id_product'=>'required',/* from hidden input */
            'name_pro'=>'required' , /**  name of cart*** */
             ]);

            $new_Dbillpru = new details_billpru;

            $new_Dbillpru->id = $id_billpru;/** from select quary */

            $new_Dbillpru->id_product = request('id_product');

            $new_Dbillpru->name_pro = request('name_pro');

            $new_Dbillpru->quantity = request('quantity');

            $new_Dbillpru->price = request('total'); /** total cart depond id product */

            $new_Dbillpru->save();

    }


    public function head_billsell(Request $request)
    {

        $this->validate(request(),[
            'id_comp'=>'required',/** look htis select deponds id with hedden input */

            'id_pharm'=>'required',/* from hidden input */

            'email'=>'required', /** email pharm */


             ]);

            $new_billsell = new head_billsell;

            $new_billsell->id_pharm =$id_pharm;

            $new_billsell->id_comp = request('id_comp');

            $new_billsell->email = request('email');

            $new_billsell->totale = request('totale'); /** or =0 */

            $new_Dbillsell->save();
    }


    public function details_billsell(Request $request)
    {

        $this->validate(request(),[


            'id_product'=>'required',/**  from hedden input *** */
            'name_pro'=>'required' , /**  from cart*** */
             ]);

            $new_Dbillsell = new details_billsell;

            $new_Dbillsell->id_billsell = request('id_billsell'); /** from select quary */

            $new_Dbillsell->id_product = request('id_product');

            $new_Dbillsell->name_pro = request('name_pro');

            $new_Dbillsell->quantity = request('quantity');


            $new_Dbillsell->orignal_price = $own_web_cust;/** 2% of cust  any products */

            $new_Dbillsell->price = request('totale');/** total cart depond id product */

            $new_Dbillsell->date_end = request('date_end'); /** date hedden input  depond id product */

            $new_Dbillsell->save();

    }

    public function benefit(Request $request)
    {


            $new_benefit = new benefit;

            $new_benefit->id_pharm =$id_pharm;    /** from hedden input  */

            $new_benefit->price = $total_own_web_cust; /** totale out of foreach  */

            $new_benefit->save();
    }


    public function delivery_bill(Request $request)
    {


            $new_delivery = new delivery_bill;

            $new_delivery->id_pharm =$id_pharm;   /** from hedden input  */

            $new_delivery->price = $cust_delivery;  /*  total is weight + distance */

            $new_delivery->save();
    }


    public function quary2()
    {
        /**
         *
         *
         *
         * $pp=DB::table('likes')
            *->where('post_id' , $post_id)
            *->where('user_id' , Auth::user()->id)
            *->value('name');

         */

        $email=$request('email');

        $id_pharm=$request('id_pharm');/** from hedden input */

        /*$created_at=>date()->now();*/

        /** by other way select max id_billpru */  /** is best way how from internet  */
     //  $id_billpru = DB::table('head_billpru')->max('created_at');


      // I will try with this
        $id_billpru = DB::table('head_billprus')->max('id_billpru');

/*
        $id_billpru = DB::table('head_billpru')
        ->where(['email' ,$email ,'id_pharm',$id_pharm,'created_at',$created_at])
        ->value('id_billpru');
*/
        if($id_billpru != null)
        {
            /** do function  details_billpru */
        }



    }


    public function quary4()
    {


        $email=$request('email');/** of pharm */

        $id_pharm=$request('id_pharm');/** from hedden input */

        $id_comp=$request('id_comp');/** from hedden input depond on id  */
        /*$created_at=>date()->now();*/

        /** by other way select max id_billpru */  /** is best way how from internet  */

        $created_at=DB::table('head_billprus')->where([
                                                        ['id_billpru','=',$id_billpru],
                                                        ['id_pharm','=',$id_pharm]
                                                    ])->value('created_at');

        $id_billpru = DB::table('head_billsells')->where([
                                                            ['email' ,'=',$email],
                                                            ['id_comp','=',$id_comp ],
                                                            ['id_pharm','=',$id_pharm],
                                                            ['created_at','<=',$created_at]
                                                    ])
                                                    ->value('id_billsell');

        if($id_billsell!= null)
        {
            /** do function  details_billsell */
        }
        else
        {
            /** do function  head_billsell */
            /** then
             *
             * do the quarey agin
             *
             * next
             *
             * do function  details_billsell
             *
            */

        }


    }


    public function quary4_1()
    {
        $totale_product=request('totale');// from hedden input depont on id_product

        $total_own_web_cust+=$totale_product;

        $weight+=request('weight');// from hedden input depont on id_product

        // updat the heads of all bills

        DB::table('head_billprus')
        ->where('id_billpru', $id_billpru)// this from first select inner the foreach
        ->update(['total' => $totale_pru]); // this equal to $totale +=total cart depond id product


        DB::table('head_billsells')
        ->where('id_bill', $id_billsell) // this from select inner the foreach
        ->update(['total' => $totale_sell]);// this equal to $totale_sell +=total cart depond id product


        }

        public function quary5()
    {

        $id_product=request('id_product');/* from hedden  */
        $id_stock=request('id_stock');/* from hedden    no nessery */

        $quantity_in=DB::table('products')->where([
                                                    ['id','=',$id_product],
                                                    ['id_stock','=',$id_stock]

                                              ])->value('quantity');

        $quantity_need=request('quantity');/* from hedden  */

        $quantity_stor=$quantity_in-$quantity_need;

        DB::table('products')->where('id',$id_product)->update('quantity',$quantity_stor);
    }


    public function quary8(Request $request)
    {
       if($request->has("paymentMethod"))
       {
        $price_wei = DB::table('weights')
        ->where([
                ['from_is','<=',$weight],
                ['to_is','>=',$weight]
               ])->value('price');

        return dd($price_wei);

       }
       // $distance=DB::table('pharm_infos')->where('id_pharm',$id_pharm)->value('distance');

        // $price_dis = DB::table('distances')
        // ->where([
        //         ['start_at','<=',$distance],
        //         ['end_at','>=',$distance]
        //         ])->value('price');

        // $cust_delivery=$price_wei+$price_dis;




    }





        /*



        $price = DB::table('orders')
                ->where('finalized', 1)
                ->avg('price');


        $price = DB::table('orders')->max('price');

        $users = DB::table('users')->select('name', 'email as user_email')->get();

        $users = DB::table('users')->where('votes', '=', 100)->get();

        $users = DB::table('users')
                ->where('votes', '>=', 100)
                        ->get();

        $users = DB::table('users')
                        ->where('votes', '<>', 100)
                        ->get();

        $users = DB::table('users')
                        ->where('name', 'like', 'T%')
                        ->get();

         $users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

         $users = DB::table('users')->where([
                ['status', '=', '1'],
                ['subscribed', '<>', '1'],
            ])->get();


            $users = DB::table('users')
           ->whereBetween('votes', [1, 100])
           ->get();

           $users = DB::table('users')
                ->whereDate('created_at', '2016-12-31')
                ->get();

        $users = DB::table('users')
                ->whereColumn('updated_at', '>', 'created_at')
                ->get();


         $users = DB::table('users')
                ->whereColumn([
                    ['first_name', '=', 'last_name'],
                    ['updated_at', '>', 'created_at'],
                ])->get();

         $user = DB::table('users')
                ->latest()
                ->first();



         select * from users where name = 'John' and (votes > 100 or title = 'Admin')
            is same
            $users = DB::table('users')
           ->where('name', '=', 'John')
           ->where(function ($query) {
               $query->where('votes', '>', 100)
                     ->orWhere('title', '=', 'Admin');
           })
           ->get();

            */






}
