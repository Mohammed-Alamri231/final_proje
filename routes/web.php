<?php
use App\Http\Controllers\Admin\AdminAuth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// Route::group(['middleware' => 'Maintenance'], function () {
//     Route::get('/', function () {
//         return view('home'); 
// });
// });
// Route::get('maintenance', function(){
//     if(setting()->status == 'open'){
//         return redirect('/');
//     }
//     return view('style.maintenance'); 
// });


/***************************/

Route::group([ 'namespace'=>'Admin'], function () {
Route::get('sm', function () {
    $nexmo=app('Nexmo\Client');
    $nexmo->message()->send([
        'to'   => '967711080822',
        'from' => 'Medicens Store',
        'text' => 'hello'
    ]);
});

Route::Post('login','AdminAuth@dologin');
Route::any('logout', 'AdminAuth@logout');

Route::get('', function () {
    return view('front_end.index');
});

Route::get('mmm', function () {
    return view('front_end.check_out');
});

// Route::get('service', function () {
//     return view('front_end.service');
// });

Route::get('about', function () {
    return view('front_end.about');
});

Route::get('sm','productsController@sms');  

Route::get('all_products','productsController@all_products');  


Route::get('check', function () {
    return view('front_end.check');
});

// Route::get('comp', function () {
    
//     return view('front_end.index');
// });

Route::get('service','serviceController@index');
Route::get('home','productsController@index2');  

if(setting()->status == 'open'){
Route::get('cart','productsController@cart');  

Route::get('add-to-cart/{id}', 'productsController@addToCart');

Route::patch('update-cart', 'productsController@update2');

Route::delete('remove-from-cart', 'productsController@remove');
}


/*  Rout for the registring of company  */

Route::get('ads','AdsController@All_Ads');
Route::post('make_new','AdsController@make_new');
Route::get('new_ads/{id_comp}','AdsController@new_Ads');

//  Route::get('comp','compController@index');

 Route::get('company', function () {
    
    return view('front_end.reg_company');
});

Route::get('pharmacy', function () {
    
    return view('front_end.reg_pharmacy');
});
Route::post('comp','compController@store_comp');
Route::post('pharm','compController@store_pharm');

Route::post('accept_comp/{id}','compController@accept_comp');
Route::post('accept_pharm/{id}','compController@accept_pharm');

Route::get('accepting_comp','compController@accepting_comp');
Route::get('accepting_pharm','compController@accepting_pharm');

Route::post('reject/{id}','compController@delete');

Route::post('touch','compController@touch');

/* test  */
//Route::post('docheck', 'checkoutController@fpru');

Route::post('docheck', 'checkoutController@doCheckout');

Route::get('help', function(){
    return view('front_end.help');
});

   /* intene */

   
   Route::group(['middleware' => 'Maintenance'], function () {
    //     Route::get('', function () {
    //        return view('admin.front_end.home'); 
           
    // });

    Route::get('home','productsController@index2'); 
    Route::get('service','serviceController@index'); 
    Route::get('all_products','productsController@all_products'); 
    
    Route::get('cart','productsController@cart');  

Route::get('add-to-cart/{id}', 'productsController@addToCart');

Route::get('accepting_comp','compController@accepting_comp');
Route::get('accepting_pharm','compController@accepting_pharm');





Route::get('ads','AdsController@All_Ads');

Route::get('new_ads/{id_comp}','AdsController@new_Ads');

//  Route::get('comp','compController@index');

 Route::get('company', function () {
    
    return view('front_end.reg_company');
});

Route::get('pharmacy', function () {
    
    return view('front_end.reg_pharmacy');
});


Route::get('check', function () {
    return view('front_end.check');
});
    });
    Route::get('maintenance', function(){
        if(setting()->status == 'open'){
           return redirect('home');

          // Route::get('home','productsController@index2');  
        }
        return view('front_end.maintenance'); 
    });

    Route::post('search_product', 'ProductsController@searchProducts'); 

   // Route::any('update_order', 'update_orderController@index1'); 

//    Route::post('search_product', 'ProductsController@searchProducts');

//    Route::resource('update_order', 'update_orderController'); 
//    Route::delete('update_order/destroy/all','update_orderController@multi_delete');

// confirm Account
Route::get('confirm/{code}','AdminAuth@confirmAccount');
});