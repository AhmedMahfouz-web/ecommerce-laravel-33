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
    public function index()
    {
        $cart = Cart::where('user_id', 1)->with('cart_product')->with('product');
        return dd($cart);
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
                return response()->json(array('response'=> 'Successfuly Added'), 200);
            } else{
                $cart_product->increment('qty');
                return response()->json(array('response'=> 'Successfuly Added'), 200);
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
