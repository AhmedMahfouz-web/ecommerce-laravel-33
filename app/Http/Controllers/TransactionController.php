<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\CartProduct;
use App\Models\Cart;

class TransactionController extends Controller
{
    public function get_checkout(){
        $addresses = Address::where('user_id', 1)->get();
        $cart_id = Cart::where('user_id', 1)->select('id')->first();
        $cart_product = CartProduct::where('cart_id', $cart_id->id)->with('product')->get();
        $total = 0;
        foreach($cart_product as $product){
            $total += ($product->product->current_price * $product->qty);
        }
        return view('front.pages.checkout', compact('addresses', 'total'));
    }

    public function checkout(Request $request){
        
    }
}
