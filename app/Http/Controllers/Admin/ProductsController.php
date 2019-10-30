<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ProductsDatatable;
use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\Size;
use App\Model\Weight;
use Illuminate\Support\Facades\Storage;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
use App\details_billpru;

class ProductsController extends Controller
{

        /*** omar adding *****/

        public function index2() // hear change 
    {
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
        /*
        return view('products', compact('products')); /**/
    }
    public function all_products() // hear change 
    {

        $products = Product::all();
        return view('front_end.all_products',compact('products'));
        
        
    }


    public function searchProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            

           $search_product = $data['product'];
          // echo '<pre>';print_r($search_product); die;

          $products = Product::where('title','like','%'.$search_product.'%')->orwhere('serial_number','like','%'.$search_product.'%')->get();
          //dd($products);
          if ($products->isEmpty())
          {
            session()->flash('error',trans('admin.product_empty'));
            return view('front_end.home',compact('products')); 
          }
          return view('front_end.home',compact('products'));

         
        }
    }
    public function cart()
    {
        return view('front_end.cart');/* */
    }

    public function update2(Request $request)  // hear change 
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('front_end._header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
       
       
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('front_end._header_cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name_pro" => $product->title,
                    "weight" => $product->weight,
                    "quantity" => 1,
                    "all_quantity" => $product->quantity,
                    "id_stock"=>$product->stock_id,
                    "id"=>$product->id,
                    "id_comp"=>$product->id_comp,
                    "price" => $product->price,
                    "photo" => $product->photo,
                    "date_end"=>$product->pro_end
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('front_end._header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('front_end._header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name_pro" => $product->title,
            "weight" => $product->weight,
            "quantity" => 1,
            "all_quantity" => $product->quantity,
            "id_stock"=>$product->stock_id,
            "id"=>$product->id,
            "id_comp"=>$product->id_comp,
            "price" => $product->price,
            "photo" => $product->photo,
            "date_end"=>$product->pro_end
        ];

        session()->put('cart', $cart);

        $htmlCart = view('front_end._header_cart')->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


        /**
         * getCartTotal
         *
         *
         * @return float|int
         */
        private function getCartTotal()
        {
            $total = 0;

            $cart = session()->get('cart');

            foreach($cart as $id => $details) {
                $total += $details['price'] * $details['quantity'];
            }

            return number_format($total, 2);
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatable $product)
    {
        return $product->render('admin.products.index',['title'=>trans('admin.products')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prepare_weight_size()
    {
        if(request()->ajax() and request()->has('dep_id'))
        {
            $dep_list = array_diff(explode(',',get_parent(request('dep_id'))),[request('dep_id')]);
            $sizes = Size::where('is_public','yes')
            ->whereIn('department_id', $dep_list)
            ->orWhere('department_id',request('dep_id'))
            ->pluck('name_'.session('lang'),'id');
            $weights = Weight::pluck('name_'.session('lang'),'id');
            
            return view('admin.products.ajax.size_weight',[
                'sizes'=>$sizes , 
                'weights'=>$weights,
                'product' =>Product::find(request('product_id')),
                ])->render();

        }else {
            return 'الرجاء اختار قسم';
        }
    }


    public function create()
    {
      $product = Product::create([
        'title'         =>'',
       // return view('admin.products.product',['title' => trans('admin.add')]);
        
     
        ]);// return view('admin.products.product',['title' => trans('admin.add')]);
        
        if(!empty($product)){
            return redirect(aurl('products/'.$product->id.'/edit'));
        }
    }

    public function delete_main_image($id){  
        $product = Product::find($id);
        Storage::delete('products/'.$product->photo);
        $product->photo =null;
        $product->save();
        //, 'photo' =>$product->photo
        return response(['status'=> true],200);
    }

    public function update_product_image($id)
    {
       $product = Product::where('id',$id)->update([
            'photo'=>up()->upload([
                    'file'=>'file',
                    'path'=>'products/'.$id,
                    'upload_type'=>'single',
                    'delete_file' => '',
                ]),
            
        ]);
        //, 'photo' =>$product->photo
        return response(['status'=> true],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data =$this->validate(request(),[
            'title'         =>'required',
            'serial_number' =>'required',
            'content'       =>'required',
            'department_id' =>'required|numeric',
            'trade_id'      =>'required|numeric',       
            'manu_id'       =>'required|numeric',
            'mall_id'       =>'sometimes|nullable',
            'stock_id'      =>'required',
            'color_id'      =>'sometimes|nullable|numeric',
            'size'          =>'sometimes|nullable',
            'size_id'       =>'sometimes|nullable|numeric',        
            'currency_id'   =>'sometimes|nullable|numeric',
            'price'         =>'required|numeric',
            'quantity'      =>'required|numeric',       
            'start_at'      =>'required|date',
            'end_at'        =>'required|date',
            'start_offer_at'=>'sometimes|nullable|date',       
            'end_offer_at'  =>'sometimes|nullable|date',
            'price_offer'   =>'sometimes|nullable|numeric',
            'other_data'    =>'',   
            'weight'        =>'sometimes|nullable',
            'weight_id'     =>'sometimes|nullable|numeric',
            'status'        =>'sometimes|nullable|in:pending,refused,active',
            'reason'        =>'sometimes|nullable',
            'pro_start'     =>'sometimes|nullable|date',
            'pro_end'       =>'sometimes|nullable|date',  
        ],[],[
            'title'       =>trans('admin.title'),
            'serial_number'  =>trans('admin.serial_number'),
            'content'       =>trans('admin.content'),
            'department_id' =>trans('admin.department_id'),
            'trade_id'      =>trans('admin.trade_id'),       
            'manu_id'       =>trans('admin.manu_id'),
            'mall_id'       =>'sometimes|nullable',
            'stock_id'       =>'required|numeric',
            'color_id'      =>trans('admin.color_id'),
            'size_id'       =>trans('admin.size'),
            'size_id'       =>trans('admin.size_id'),        
            'currency_id'   =>trans('admin.currency_id'),
            'price'         =>trans('admin.price'),
            'quantity'         =>trans('admin.quantity'),       
            'start_at'      =>trans('admin.start_at'),
            'end_at'        =>trans('admin.end_at'),
            'start_offer_at'=>trans('admin.start_offer_at'),       
            'end_offer_at'  =>trans('admin.end_offer_at'),
            'price_offer'   =>trans('admin.price_offer'),
            'other_data'    =>trans('admin.other_data'),   
            'weight'        =>trans('admin.weight'),
            'weight_id'     =>trans('admin.weight_id'),
            'status'        =>trans('admin.status'),
            'reason'        =>trans('admin.reason'),
            'pro_start'     =>trans('admin.pro_start'),
            'pro_end'       =>trans('admin.pro_end'), 
        ]);
        /*if(request()->hasFile('logo'))
        {
            $data['logo'] = up()->upload([
                'file'=>'logo',
                'path'=>'products',
                'upload_type'=>'single',
                'delete_file' => '',
            ]);
        }*/
        Product::create($data);
    session()->flash('success',trans('admin.record_added'));
    return redirect(aurl('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.product',['title' => trans('admin.create_or_edit_product',['title'=>$product->title]),'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_file($id){
        if(request()->hasFile('file'))
        {
           $fid = up()->upload([
                'file'=>'file',
                'path'=>'product/'.$id,
                'upload_type'=>'files',
                'file_type'=>'product',
                'relation_id' => $id,
            ]);

            return response(['status'=> true , 'id' =>$fid],200);
        }
    }

    public function delete_file($id){
        if(request()->has('id'))
        {
            up()->delete(request('id'));
        }
    }

    public function update($id)
    {
        $data =$this->validate(request(),[
            'title'         =>'required',
            'serial_number' =>'required',
            'content'       =>'required',
            'department_id' =>'required|numeric',
            'trade_id'      =>'required|numeric',       
            'manu_id'       =>'required|numeric',
            'mall_id'       =>'sometimes|nullable',
            'stock_id'       =>'required|numeric',
            'color_id'      =>'sometimes|nullable|numeric',
            'size'          =>'sometimes|nullable',
            'size_id'       =>'sometimes|nullable|numeric',        
            'currency_id'   =>'sometimes|nullable|numeric',
            'price'         =>'required|numeric',
            'quantity'      =>'required|numeric',       
            'start_at'      =>'required|date',
            'end_at'        =>'required|date',
            'start_offer_at'=>'sometimes|nullable|date',       
            'end_offer_at'  =>'sometimes|nullable|date',
            'price_offer'   =>'sometimes|nullable|numeric',
            'other_data'    =>'',   
            'weight'        =>'sometimes|nullable',
            'weight_id'     =>'sometimes|nullable|numeric',
            'status'        =>'sometimes|nullable|in:pending,refused,active',
            'reason'        =>'sometimes|nullable',
            'pro_start'     =>'sometimes|nullable|date',
            'pro_end'       =>'sometimes|nullable|date',   
        ],[],[
            'title'       =>trans('admin.title'),
            'serial_number'=>trans('admin.serial_number'),
            'content'       =>trans('admin.content'),
            'department_id' =>trans('admin.department_id'),
            'trade_id'      =>trans('admin.trade_id'),       
            'manu_id'       =>trans('admin.manu_id'),
            'mall_id'       =>'sometimes|nullable',
            'stock_id'       =>'required|numeric',
            'color_id'      =>trans('admin.color_id'),
            'size_id'       =>trans('admin.size'),
            'size_id'       =>trans('admin.size_id'),        
            'currency_id'   =>trans('admin.currency_id'),
            'price'         =>trans('admin.price'),
            'quantity'         =>trans('admin.quantity'),       
            'start_at'      =>trans('admin.start_at'),
            'end_at'        =>trans('admin.end_at'),
            'start_offer_at'=>trans('admin.start_offer_at'),       
            'end_offer_at'  =>trans('admin.end_offer_at'),
            'price_offer'   =>trans('admin.price_offer'),
            'other_data'    =>trans('admin.other_data'),   
            'weight'        =>trans('admin.weight'),
            'weight_id'     =>trans('admin.weight_id'),
            'status'        =>trans('admin.status'),
            'reason'        =>trans('admin.reason'),
            'pro_start'     =>trans('admin.pro_start'),
            'pro_end'       =>trans('admin.pro_end'), 
        ]);
        // if(request()->has('input_value') && request()->has('input_key'))
        // {
        //     $i = 0;
        //     $other_data = '';
        //     foreach(request('input_key') as $key){
        //         $other_data .= $key.'||'.request('input_value')[$i].'|';
        //         $i++;
        //     }
        // $data['other_data'] = rtrim($other_data ,'|') ;
        // }
    Product::where('id',$id)->update($data);
    return response(['status'=>true,'message'=>trans('admin.record_added')],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::find($id);
        Storage::delete($products->logo);
        $products->delete();
        session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
    }
    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $products=Product::find($id);
                Storage::delete($products->logo);
                $products->delete();  
            }
		} else {
            $products=Product::find(request('item'));
            Storage::delete($products->logo);
            $products->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
    }
}