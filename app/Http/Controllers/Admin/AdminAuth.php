<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin;
use App\Model\Product;
use App\Mail\AdminResetPassword;
use App\Notifications\Orders;
use App\Notifications\Suggestions;
use DB;
use Mail;


use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;


class AdminAuth extends Controller
{
    public function login(){

        
        // $products = Product::all();
        // return view('front_end.home',compact('products'));

        $meta_title ="Mediciens Store";
        $meta_description ="Online Shipping Site for Mediciens";
        $meta_keywords="Mediciens website , online shipping , mediciens";
         $fproducts = Product::all();
        // return view('front_end.home',compact('products','meta_title','meta_description','meta_keywords'));
        
        $products = DB::table('details_billprus')
        ->leftJoin('products','products.id','=','details_billprus.id_product')
        ->select('products.id','products.title','products.photo','products.price','products.quantity','products.content','details_billprus.id_product',
             DB::raw('SUM(details_billprus.quantity) as total'))
        ->groupBy('products.id','details_billprus.id_product','products.title','products.photo','products.price','products.quantity','products.content')
         ->orderBy('total','desc')
        ->limit(8)
        ->get();
        // return dd($products);
        return view('front_end.home',compact('products','fproducts','meta_title','meta_description','meta_keywords'));

        
        // $products = Product::latest()->paginate(4);
        
        // return view('front_end.home',compact('products'));

      // return view('admin.login');
    }

    public function confirmAccount($email){
       echo $email = base64_encode($email); die();

    }

    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true :false;

        $email= request('email');

        if(admin()->attempt(['email' => request('email'), 'password' => request('password'),'status' =>'1'],$rememberme))
        {

            $cat = DB::table('admins')->where('email' , $email)->value('type');

            if($cat == 'admin' )
            {
            //   // return redirect('admin');
              // $admin = DB::table('admins')->where('id' , 1);
            //     $admin = Admin::all()->where('type' , 'admin');
            //    // $admin= admin()->user()->type=='admin';
            //    Notification::send($admin ,new Orders());
            //  $admin->notify(new Orders());
              return redirect(url('home'));
             
            }
            else
            {
                return redirect(url('home'));  
            }
          
            

        }
        else {
            session()->flash('error',trans('admin.incorrect_information_login'));
            return view('admin.login');
            
        }
        
    }
    
    public function logout()
    {
        auth()->guard('admin')->logout();
        session()->forget('cart');

        // $products = Product::all();
        $meta_title ="Mediciens Store";
        $meta_description ="Online Shipping Site for Mediciens";
        $meta_keywords="Mediciens website , online shipping , mediciens";
         $fproducts = Product::all();
        // return view('front_end.home',compact('products','meta_title','meta_description','meta_keywords'));
        
        $products = DB::table('details_billprus')
        ->leftJoin('products','products.id','=','details_billprus.id_product')
        ->select('products.id','products.title','products.photo','products.price','products.quantity','products.content','details_billprus.id_product',
             DB::raw('SUM(details_billprus.quantity) as total'))
        ->groupBy('products.id','details_billprus.id_product','products.title','products.photo','products.price','products.quantity','products.content')
         ->orderBy('total','desc')
        ->limit(8)
        ->get();
        // return dd($products);
        return view('front_end.home',compact('products','fproducts','meta_title','meta_description','meta_keywords'));

        // return view('front_end.home',compact('products'));

       // return redirect(aurl('login'));  
    }
    public function forgot_password()
    {
        return view('admin.forgot_password');
    }

    public function forgot_password_post(){
        $admin =Admin::where('email',request('email'))->first();
        if(!empty($admin)){
            $token =app('auth.password.broker')->createToken($admin);
            $data =DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
           
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('admin.the_link_reset_sent'));
            return back();
        }
        return back();
    }

    public function reset_password($token)
    {
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token))
        {
            return view('admin.reset_password',['data'=>$check_token]);
        }
        else {
            return redirect(aurl('forgot/password'));
        }
    }

    public function reset_password_final($token)
    {
        $this->validate(request(),[
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',

        ],[],[
            'password'=>'Password',
            'password_confirmation'=>'Confirmation Password'
        ]);
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token))
        {
            $admin =Admin::where('email',$check_token->email)->update(['email'=>$check_token->email,
            'password'=>bcrypt(request('password'))
            ]);

            DB::table('password_resets')->where('email',request('email'))->delete();
            admin()->attempt(['email' =>$check_token->email, 'password' => request('password')],true);
            return redirect(aurl(''));
        }   
        else {
            return redirect(aurl('forgot/password'));
        }
    }
}
