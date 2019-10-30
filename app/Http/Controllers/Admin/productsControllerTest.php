<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductsTest;

class productsControllerTest extends Controller
{
    
    public function index()
    {

        $products = ProductsTest::all();
        return view('admin.front_end.home',compact('products'));
        /*
        return view('products', compact('products')); /**/
    }

    public function cart()
    {
        return view('admin.front_end.cart');/* */
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
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

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function addToCart($id)
    {
   
        $product = ProductsTest::Find($id);

        //return $product;
      if(!$product) {

            abort(404);

        }
      

        $cart = session()->get('cart');
       // return view('admin.front_end.home');
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "id"=>$product->id,
                    "id_type"=> $product->id_type,
                    "dis"=> $product->dis,
                    "description" => $product->description, 
                     "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "id"=>$product->id,
            "id_type"=>$product->id_type,
            "dis"=> $product->dis,
            "description" => $product->description,
          
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');


    }
}
