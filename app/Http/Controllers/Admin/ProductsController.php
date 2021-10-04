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
        $products = Product::with('main_category')->with('sub_category')->with('vendor')->with('other_photos')->selection()->paginate(25);
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
    public function update($id, ProductsRequest $request)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->route('admin.products')->with(['error', 'This product doesn\'t exist']);
            }

            $sub_category_id = '';
            if ($request->has('sub_category_id')) {
                $sub_category_id = $request->sub_category_id;
            }

            // Upload Main Image
            $main_img_filePath = '';
            if ($request->has('img')) {
                $main_img_filePath = uploadImg('products', $request->img);
                unlink('../public/' . $product->photo); // delete img file
            } else {
                $main_img_filePath = $product->photo;
            }

            DB::beginTransaction();

            // Update Product
            $product->update([
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
                        'product_id' => $id,
                    ]);
                }
            }

            // Delete other Images
            if ($request->has('delete')) {
                foreach ($request->delete as $delete) {
                    $photo = Photo::find($delete);
                    unlink('../public/' . $photo->name); // delete img file
                    $photo->delete();
                }
            }

            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'Product has been updated successfully']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.products')->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $other_photos = $product->other_photos;

            DB::beginTransaction();

            unlink('../public/' . $product->photo); // Delete Main img file
            $product->delete(); // Delete Product

            foreach ($other_photos as $photo) {
                unlink('../public/' . $photo->name); // Delete img file
                $photo->delete(); // Delete Photo
            }

            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'Prodyct has been deleted successfully.']);
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('admin.products')->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
