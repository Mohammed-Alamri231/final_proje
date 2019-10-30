<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\Update_orderDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\comp_info;
use App\Admin;
use App\details_billpru;
use App\details_billsell;
use App\Model\Stock;
use DB;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use DateTime;

use Illuminate\Support\Facades\Storage;

class update_orderController extends Controller
{


    public function index2(Update_orderDatatable $Re_order ,Request $request  )
    {

           $id_bill = $request->input('id_bill');


           return $Re_order->with('id_billpru',$id_bill)->render('admin.update_order.index');

    }



    public function index(Update_orderDatatable $Re_order ,Request $request )
    {

        $id_bill = $request->input('id_bill');
     
         $id_pharm = $request->input('id_pharm');

         $bollean_condation=DB::table('head_billprus')->where([['id_billpru',$id_bill],['id_pharm',$id_pharm]])->value('id_billpru');

         $bill_date=DB::table('head_billprus')->where([['id_billpru',$id_bill],['id_pharm',$id_pharm]])->value('created_at');

         $now = date('Y-m-d');

         $datetime1 = new DateTime($now);
         $datetime2 = new DateTime($bill_date);
         $interval = $datetime1->diff($datetime2);
         $days = $interval->format('%a');

            //  return dd($days);
         if($bollean_condation != null  && ( $days ==1  || $days==0))
         {
           session()->flash('success',trans('admin.flash you cant update or remove your order becuse your order duration is expaierd had  tow days or more'));

             return $Re_order->with('id_billpru',$id_bill)->render('admin.update_order.index');

         }
         elseif($bollean_condation != null  && ( $days >=2))
         {
           session()->flash('error',trans('admin.flash you cant update or remove your order becuse your order duration is expaierd had  tow days or more'));

            $id_bill=null;

           // session()->flash('success',trans('admin.record_added'));
        //    session()->flash('error',trans('admin.flash you cant update or remove your order becuse your order duration is expaierd had  tow days or more'));
            return $Re_order->with('id_billpru',$id_bill)->render('admin.update_order.index');
            /// flash you cant update or remove your order becuse your order duration is expaierd had  tow days or more

         }else
         {
            $id_bill=null;
            return $Re_order->with('id_billpru',$id_bill)->render('admin.update_order.index');

         }
    }

    public function send_emails(Request $request)
    {

        $id_pharm = request('id_pharm');
        $id_billpru = request('id_bill');
       // $email=request('email');
        // return dd ($id_billpru);
        $content_pru = DB::table('details_billprus')->where([
                                                                ['id_billpru' , $id_billpru]

                                                                ])->get();

            //   return dd($content_pru);
        $total_pru = DB::table('head_billprus')->where([

                                                        ['id_billpru' , $id_billpru],
                                                        ['id_pharm' , $id_pharm]

                                                        ])->value('totale');

         $email=(admin()->user()->email);

         $messageData = [
            'email' => $email,
            'name_pro'=> $content_pru,
            'total'=>$total_pru
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
            'name_pro'=> $content_sell,
            'total'=>$total_sell



        ];
        //return dd($messageData);

        Mail::send('admin.emails.order_update', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Medicens STORE');
        });

        # code...
       }


    }
    public function store()
    {


    }


    public function edit($id_billpru)
    {
       // return dd($id_billpru);
        $stock = details_billpru::find($id_billpru);



        $title =request('admin.edit');
        return view('admin.update_order.edit',compact('stock','title'));
    }

    public function update(Request $request, $id_billpru)
    {

    $id_product=request('id_product');
    $id_comp=request('id_comp');
    $up_quan = request('quantity');
    $bill_price = request('price');
    $id_pharm = request('id_pharm');/* from registion */
   // return dd($id_pharm);
        $id = request('id');

        // $id_pharm=1;

        $stock_quan=DB::table('products')->where('id',$id_product)->value('quantity');


        $bill_quan = DB::table('details_billprus')->where([

                                                            ['id_billpru' , $id_billpru],
                                                            ['id_comp',$id_comp],
                                                            ['id_product',$id_product],

                                                            ])->value('quantity');

            $compaining_quan=$bill_quan+$stock_quan;

            if($compaining_quan < $up_quan)
            {
               // session()->flash('error',request('admin.record_added'));
                /* the avalibale is  {{ $compaining_quan }}*/
               session()->flash('error',trans('admin.this quantity un available'));

                return back();
            }
            else
            {
                $price_one = $bill_price / $bill_quan;
                $price = $price_one * $up_quan;


                $total=DB::table('head_billprus')->where('id_billpru',$id_billpru)->value('totale');

                $end_total = $total - $bill_price + $price;


                DB::table('head_billprus')
                                            ->where('id_billpru',$id_billpru)
                                            ->update([
                                                'totale' =>$end_total

                                                ]);

             DB::table('details_billprus') ->where([
                                                        ['id_billpru' , $id_billpru],
                                                        ['id_product',$id_product]
                                                     ])
                                            ->update(
                                                        ['price' =>$price]


                                        );

             DB::table('details_billprus') ->where([
                                            ['id_billpru' , $id_billpru],
                                            ['id_product',$id_product]
                                         ])
                                ->update(

                                            ['quantity' =>$up_quan]

                                        );


            $id_billsell = DB::table('head_billsells')->where([
                                                                ['id_billpru' , $id_billpru],
                                                                ['id_comp',$id_comp],
                                                                ['no_pharm' , $id_pharm],

                                                                ])->value('id_bill');

            $totalsell=DB::table('head_billsells')->where('id_bill',$id_billsell)->value('totale');


            $end_totalsell = $totalsell - $bill_price + $price;


            DB::table('head_billsells')
                                        ->where('id_bill',$id_billsell)
                                        ->update([
                                                'totale' =>$end_totalsell

                                         ]);


                DB::table('details_billsells')
                                             ->where([
                                                         ['id_billsell' , $id_billsell],
                                                         ['id_product',$id_product],
                                                      ])
                                             ->update(
                                                         ['price' =>$price]


                                         );


                DB::table('details_billsells')
                                                ->where([
                                                            ['id_billsell' , $id_billsell],
                                                            ['id_product',$id_product],
                                                        ])
                                                ->update(
                                                    ['quantity' =>$up_quan]

                                                );

             $stock_quantity= $stock_quan + $bill_quan - $up_quan;

             DB::table('products')
                                     ->where('id',$id_product)
                                     ->update([
                                                 'quantity' =>$stock_quantity

                                             ]);
             // session()->flash('success',request('admin.record_added'));
            /* the avalibale is  {{ $compaining_quan }}*/
        //    return redirect('admin/update_order/index');
            return back();

        }



    }



    public function destroy(Request $request )
    {
        // $stocks=details_billpru::find($id_billpru);
        // Storage::delete($stocks->logo);
        // $stocks->delete();
        // session()->flash('success', request('admin.deleted_record'));
        // return redirect(aurl('update_order'));


        $id_product=request('id_product');
        $id_comp=request('id_comp');
        $bill_quan=request('quantity');
        $bill_price=request('price');
        $id_pharm=request('id_pharm');/* from registion */
        $id_billpru=request('id_bill');
        // return dd($id_billpru);

        $id_comp=request('id_comp');

        // $id_pharm=1;

        $stock_quan=DB::table('products')->where('id',$id_product)->value('quantity');

        $compaining_quan=$bill_quan+$stock_quan;


        DB::table('products')
                            ->where('id',$id_product)
                            ->update([
                                        'quantity' =>$compaining_quan

                                    ]);

        $total=DB::table('head_billprus')->where('id_billpru',$id_billpru)->value('totale');

        $end_total=$total-$bill_price;


        DB::table('head_billprus')
                            ->where('id_billpru',$id_billpru)
                            ->update([
                                        'totale' =>$end_total

         ]);

        //  $test = DB::table('details_billprus')->where([

        //     ['id_billpru' , $id_billpru],
            

        // ])->count();

         DB::table('details_billprus')->where([

                                            ['id_billpru' , $id_billpru],
                                            ['id_product',$id_product],

                                            ])->delete();


         $id_billsell = DB::table('head_billsells')->where([

                                                            ['id_billpru' , $id_billpru],
                                                            ['id_comp',$id_comp],
                                                            ['no_pharm' , $id_pharm],

                                                        ])->value('id_bill');

        $totalsell=DB::table('head_billsells')->where('id_bill',$id_billsell)->value('totale');


        $end_totalsell=$totalsell-$bill_price;


         DB::table('head_billsells')
                                    ->where('id_bill',$id_billsell)
                                    ->update([
                                                'totale' =>$end_totalsell

                                           ]);

         DB::table('details_billsells')->where([
                                                    ['id_billsell' , $id_billsell],
                                                    ['id_product',$id_product],

                                              ])->delete();

        
            //      function index(Update_orderDatatable $Re_order ,Request $request  )
            //    {
            
            //             $id_bill = $id_billpru;
            
            
            //             return $Re_order->with('id_billpru',$id_bill)->render('admin.update_order.index');
            
            //     }
            //  if($test >0){
            //     session()->flash('success', request('admin.deleted_record'));
            //     return back();
            // }else{
            //     return dd($test);
            // }

            return view('admin.update_order.edit1',compact('id_billpru'));
               
         
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $bills_pru=details_billpru::find($id);
                Storage::delete($bills_pru->logo);
                $bills_pru->delete();
            }
		} else {
            $bills_pru=details_billpru::find(request('item'));
            Storage::delete($bills_pru->logo);
            $bills_pru->delete();
		}
		session()->flash('success', request('admin.deleted_record'));
		return redirect(aurl('bills'));
    }

}



