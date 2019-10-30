<?php
use App\Http\Controllers\Admin\AdminAuth;
//use Illuminate\Routing\Route;

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    Config::set('auth.defines', 'admin');

    Route::get('login','AdminAuth@login');
    Route::get('forgot/password','AdminAuth@forgot_password');
    Route::post('forgot/password','AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}','AdminAuth@reset_password');
    Route::post('reset/password/{token}','AdminAuth@reset_password_final');
    Route::Post('login','AdminAuth@dologin');
    

    Route::group(['middleware' => 'admin:admin'], function () {
    Route::resource('admin', 'AdminController');    
    Route::delete('admin/destroy/all','AdminController@multi_delete');    
    
    Route::resource('users', 'UsersController');    
    Route::delete('users/destroy/all','UsersController@multi_delete'); 
    
    
    Route::resource('company_info', 'compController');    
    Route::delete('company_info/destroy/all','compController@multi_delete'); 

    Route::resource('pharmacy_info', 'pharmController');    
    Route::delete('parmacy_info/destroy/all','pharmController@multi_delete'); 

    Route::resource('bills', 'billsController');    
    Route::delete('bills/destroy/all','billsController@multi_delete');

    Route::resource('bills_pru', 'bills_PruController');    
    Route::delete('bills_pru/destroy/all','bills_PruController@multi_delete');



    Route::resource('countries', 'CountriesController'); 
    Route::delete('countries/destroy/all','CountriesController@multi_delete'); 

    Route::resource('cities', 'CitiesController'); 
    Route::delete('cities/destroy/all','CitiesController@multi_delete'); 

    Route::resource('states', 'StatesController'); 
    Route::delete('states/destroy/all','StatesController@multi_delete'); 

    Route::resource('trademarks', 'TradeMarksController'); 
    Route::delete('trademarks/destroy/all','TradeMarksController@multi_delete');

    Route::resource('manufacturers', 'ManufacturersController'); 
    Route::delete('manufacturers/destroy/all','ManufacturersController@multi_delete'); 

    Route::resource('shipping', 'ShippingController'); 
    Route::delete('shipping/destroy/all','ShippingController@multi_delete'); 

    Route::resource('malls', 'MallsController'); 
    Route::delete('malls/destroy/all','MallsController@multi_delete'); 

    Route::resource('stocks', 'StocksController'); 
    Route::delete('stocks/destroy/all','StocksController@multi_delete'); 

    Route::resource('colors', 'ColorsController'); 
    Route::delete('colors/destroy/all','ColorsController@multi_delete');

    Route::resource('weights', 'WeightsController'); 
    Route::delete('weights/destroy/all','WeightsController@multi_delete');

    Route::resource('sizes', 'SizesController'); 
    Route::delete('sizes/destroy/all','SizesController@multi_delete');

    Route::resource('products', 'ProductsController'); 
    Route::delete('products/destroy/all','ProductsController@multi_delete');
    Route::post('upload/image/{pid}', 'ProductsController@upload_file'); 

    


    // Route::resource('update_order', 'update_orderController'); 
    // Route::delete('update_order/destroy/all','update_orderController@multi_delete');

    Route::post('delete/image', 'ProductsController@delete_file');
    Route::post('update/image/{pid}', 'ProductsController@update_product_image');

    Route::post('delete/product/image/{pid}', 'ProductsController@delete_main_image'); 
    Route::post('load/weight/size', 'ProductsController@prepare_weight_size'); 

    Route::resource('departments', 'DepartmentsController');

    // Route::get('/', function()
    // {
    //     if(auth()->guard('admin')->check() && (admin()->user()->type=='admin'||admin()->user()->type=='company'))
    //     {
              
    //                 return view('admin.home');
    //     }
    //     else 
    //     {
    
    //         return redirect('admin/home');
    //     }
    // });
  
    
    Route::get('settings', 'Settings@setting');
    Route::post('settings', 'Settings@setting_save');
    
    Route::any('logout', 'AdminAuth@logout'); 
});
    
    Route::get('lang/{lang}', function($lang){
        session()->has('lang')? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang','ar') :session()->put('lang','en');

        return back();
      
    });


    /* front_end*/

    // Route::get('/sm', function () {
    //     $nexmo=app('Nexmo\Client');
    //     $nexmo->message()->send([
    //         'to'   => '967711080822',
    //         'from' => 'Medicens Store',
    //         'text' => 'hello'
    //     ]);
    // });

    // Route::get('', function () {
    //     return view('front_end.index');
    // });

    // Route::get('/mmm', function () {
    //     return view('front_end.check_out');
    // });

    // Route::get('/service', function () {
    //     return view('front_end.service');
    // });

    // Route::get('/about', function () {
    //     return view('front_end.about');
    // });

    // Route::get('/sm','productsController@sms'  );  

    // Route::get('/all_products','productsController@all_products');  

    Route::post('search_product', 'ProductsController@searchProducts'); 

     Route::any('update_order', 'update_orderController@index1'); 
     Route::any('update_order_update/{id_billpru}', 'update_orderController@update'); 

     
    Route::resource('update_order', 'update_orderController'); 
    Route::delete('update_order/destroy/all','update_orderController@multi_delete');


    /*****************************/
    Route::any('back_to', 'update_orderController@index'); 
    Route::any('resend_emails', 'update_orderController@send_emails'); 

    //Route::post('update_order_search', 'update_orderController@searching'); 

    // Route::get('update_order_index', 'update_orderController@i  
    /*****************************/

//     Route::get('/check', function () {
//         return view('front_end.check');
//     });

//     Route::get('/comp', function () {
        
//         return view('front_end.index');
//     });
   
//     Route::get('/home','productsController@index2');  
    
//     if(setting()->status == 'open'){
//     Route::get('/cart','productsController@cart');  
    
//     Route::get('/add-to-cart/{id}', 'productsController@addToCart');
   
//     Route::patch('/update-cart', 'productsController@update2');

//     Route::delete('/remove-from-cart', 'productsController@remove');
//     }

//     /*  Rout for the registring of company  */

//     Route::get('/ads','AdsController@All_Ads');
//     Route::post('/make_new','AdsController@make_new');
//     Route::get('/new_ads/{id_comp}','AdsController@new_Ads');

//   //  Route::get('/comp','compController@index');


//     Route::post('/comp','compController@store_comp');
//     Route::post('/pharm','compController@store_pharm');

//     Route::post('/accept_comp/{id}','compController@accept_comp');
//     Route::post('/accept_pharm/{id}','compController@accept_pharm');

//     Route::get('/accepting_comp','compController@accepting_comp');
//     Route::get('/accepting_pharm','compController@accepting_pharm');

//     Route::post('/reject/{id}','compController@delete');

//     Route::post('/touch','compController@touch');

//     /* test  */
//     //Route::post('/docheck', 'checkoutController@fpru');

//     Route::post('/docheck', 'checkoutController@doCheckout');


//    /* intene */

   
//    Route::group(['middleware' => 'Maintenance'], function () {
//     //     Route::get('/', function () {
//     //        return view('admin.front_end.home'); 
           
//     // });

//     Route::get('/home','productsController@index2');  
//     });
//     Route::get('maintenance', function(){
//         if(setting()->status == 'open'){
//            return redirect('/admin/home');

//           // Route::get('/home','productsController@index2');  
//         }
//         return view('front_end.maintenance'); 
//     });
    

Route::get('/','statisticsController@index');
});
    
