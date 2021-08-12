<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use App\Models\SubCategories;
use App\Models\MainCategories;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::selection()->paginate(50);
        return view('dashboard.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->active()->get();
        $sub_categories = SubCategories::select('name', 'id')->where('translation_lang', get_locale_language())->active()->get();
        return view('dashboard.pages.products.create', compact(['categories', 'sub_categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        try {
            // Upload Main Image
            $main_img_filePath = '';
            if ($request->has('img')) {
                $main_img_filePath = uploadImg('products', $request->img);
            }

            $sub_category_id = '';
            if ($request->has('sub_category_id')) {
                $sub_category_id = $request->sub_category_id;
            }

            DB::beginTransaction();

            // Insert Product and Get Its Id
            $product_id = Product::insertGetId([
                'category_id' => $request->category_id,
                'vendor_id' => 1,
                'sub_category_id' => $sub_category_id,
                'title' => $request->title,
                'description' => $request->description,
                'qty' => $request->qty,
                'current_price' => $request->current_price,
                'old_price' => $request->old_price,
                'photo' => $main_img_filePath,
            ]);


            // Upload and Insert other Images
            if ($request->has('other_image')) {
                $other_img_filePath = '';
                foreach ($request->other_image as $other) {
                    $other_img_filePath = uploadImg('products', $other);
                    Photo::insert([
                        'name' => $other_img_filePath,
                        'product_id' => $product_id,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'Product has been added successfully.']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.products')->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::selection()->with('other_photos')->find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with(['error', 'This product doesn\'t exist']);
        }

        $categories = MainCategories::select('id', 'name')->where('translation_lang', get_locale_language())->active()->get();
        $sub_categories = SubCategories::select('id', 'name')->where('translation_lang', get_locale_language())->active()->get();

        return view('dashboard.pages.products.edit', compact(['product', 'categories', 'sub_categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
