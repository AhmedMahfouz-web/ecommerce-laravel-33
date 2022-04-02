<?php

namespace App\Http\Controllers;

use App\Models\MainCategories;
use App\Models\Product;
use App\Models\SubCategories;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.ss
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(Request $request)
    {
        if($request->search){
            $search = $request->search;

            $products = Product::where(
            'title', 'Like', '%' . $search . '%'
            );

            $category_id = $request->category;

            if($category_id != 0){
                $products = $products->where('category_id', $category_id);
            }

            $products = $products->paginate(50);

            return view('front.pages.search', compact(['products', 'search', 'category_id']));
        }
        return view('front.home');
    }

    public function product($slug)
    {
        $product = Product::with(['main_category', 'vendor'])->where('slug', $slug)->first();

        return view('front.pages.product', compact(['product']));
    }

}
