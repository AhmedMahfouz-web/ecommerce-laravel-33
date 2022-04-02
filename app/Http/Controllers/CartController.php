<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_cart(){
        $cart = Cart::with(['cart_product' => function ($q)
        {
            $q->with('product');
        }])
        ->where('user_id', 1)->first();
        return view('front.pages.cart', compact('cart'));
    }

    public function add_to_cart($slug){
        // $user = auth()->user()->id;

        $cart = Cart::where('user_id', 1)->first();
        $product = Product::where('slug', $slug)->first();
        if( $cart == null){
            $cart = Cart::create(['user_id' => 1]);
        }
        
            $cart_product = CartProduct::where(['cart_id' => $cart->id, 'product_id' => $product->id])->first();
            
            if($cart_product == null){
                $cart_product = CartProduct::create(['cart_id' => $cart->id, 'product_id' => $product->id, 'qty' => '1']);
                $data = [
                    'response' => 'successfuly added',
                    'cart_product' => [
                        'product_name' => $product->title,
                        'qty' => '1',
                    ]
                    ];

                return response()->json($data, 200);
            } else{
                $cart_product->increment('qty');
                return response()->json(array('response' => 'Successfuly Added'), 200);
            }

    }

    public function remove_from_cart($slug){
        $cart = Cart::where('user_id', 1)->first();
        $product = Product::where('slug', $slug)->first();
        $cart_product = CartProduct::where(['cart_id' => $cart->id, 'product_id' => $product->id])->delete();
        return response()->json(array('response' => 'Successfuly Removed'), 200);
    }

}
