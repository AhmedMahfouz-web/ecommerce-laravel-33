<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategories;
use App\Http\Requests\MainCategoryRequest;
use ArrayObject;
use Illuminate\Support\Facades\DB;

class MainCategoriesController extends Controller
{
    // Get Categories
    public function index()
    {
        $locale_language = get_locale_language();
        $main_categories = MainCategories::where('translation_lang', $locale_language)->Selection()->paginate(PAGINATION_COUNT);

        return view('dashboard.pages.main_categories.index', compact('main_categories'));
    } // End Index function


    // Get Create Page
    public function create()
    {

        return view('dashboard.pages.main_categories.create');
    } // End Create function


    // Save Category
    public function store(MainCategoryRequest $request)
    {

        try {
            // Filter Request
            $main_categories = collect($request->category); // to filter categories
            $default_category = $main_categories->filter(function ($value, $key) {
                return $value['translation_lang'] == get_locale_language();
            });

            //Upload and Get Photo Name
            $filePath = "";
            if ($request->has("photo")) {
                $filePath = uploadImg('main_category', $request->photo);
            }

            $active = 0;
            if (isset($default_category[0]['active'])) {
                $active = 1;
            }

            DB::beginTransaction();

            // Insert into database
            $default_category_id = MainCategories::insertGetId([
                'translation_lang' => $default_category[0]['translation_lang'],
                'name' => $default_category[0]['name'],
                'slug' => $default_category[0]['name'],
                'translation_of' => 0,
                'photo' => $filePath,
                'active' => $active,
            ]);


            // Filter Request
            $categories = $main_categories->filter(function ($value, $key) {
                return $value['translation_lang'] != get_locale_language();
            });

            //Check if there's another language
            if (isset($categories) && $categories->count()) {
                $arr = [];
                foreach ($categories as $index => $category) {

                    //Check active status
                    if (isset($category['active'])) {
                        $active = 1;
                    } else {
                        $active = 0;
                    }

                    //Set arr values
                    $arr = [
                        'translation_lang' => $category['translation_lang'],
                        'name' => $category['name'],
                        'slug' => $category['name'],
                        'translation_of' => $default_category_id,
                        'active' => $active,
                        'photo' => $filePath,
                    ];

                    MainCategories::insert($arr);
                } // End foreach

            }

            DB::commit();

            return redirect()->route('admin.mainCategories')->with(['success' => 'Category has been created successfully.']);
        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.mainCategories')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Catch

    } // End Store Function


    public function edit($id)
    {
        $category = MainCategories::with('categories')->selection()->find($id);

        if (!$category) {
            return redirect()->route('admin.mainCategories')->with(['error' => 'This category doesn\'t exist.']);
        }

        return view('dashboard.pages.main_categories.edit', compact('category'));
    } // End Edit Function

    public function update($id, MainCategoryRequest $request)
    {
        try {
            $main_category = MainCategories::find($id);

            if (!$main_category) {
                return redirect()->route('admin.mainCategories')->with(['error' => 'This category doesn\'t exist.']);
            }

            $filePath = $main_category->photo;
            if ($request->has('photo')) {
                $filePath = uploadImg('main_category', $request->photo);
                unlink('../public/' . $main_category->photo); // Delete old img
            }

            $category = array_values($request->category)[0];

            if (!isset($category['active'])) {
                $category['active'] = 0;
            }

            DB::beginTransaction();

            MainCategories::where('id', $id)->update([
                'name' => $category['name'],
                'active' => $category['active'],
                'photo' => $filePath
            ]);

            // Update img in other languages
            if ($request->has('photo')) {
                MainCategories::where('translation_of', $id)->update([
                    'photo' => $filePath
                ]);
            }

            DB::commit();
            return redirect()->route('admin.mainCategories')->with(['success' => 'Category has been updated successfully.']);
        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.mainCategories')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Catch
    } // End Update Function

    public function destroy($id)
    {
        try {
            $category = MainCategories::find($id);

            if (!$category) {
                return redirect()->route('admin.mainCategories')->with(['error' => 'This category doesn\'t exist.']);
            }

            if ($category->vendors && $category->vendors->count() > 0) {
                return redirect()->route('admin.mainCategories')->with(['error' => 'Can\'t delete, This category has Vendors']);
            }

            unlink('../public/' . $category->photo); // delete img

            $category->delete();

            return redirect(route('admin.mainCategories'))->with(['success' => 'Category has been deleted successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.mainCategories'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $category = MainCategories::find($id);

            if (!$category) {
                return redirect()->route('admin.mainCategories')->with(['error' => 'This category doesn\'t exist.']);
            }


            $status = $category->active == 1 ? 0 : 1;
            $category->update(['active' => $status]);

            if ($status == 1) {
                return redirect(route('admin.mainCategories'))->with(['success' => 'Category has been activated successfully.']);
            } else {
                return redirect(route('admin.mainCategories'))->with(['success' => 'Category has been deactivated successfully.']);
            }
        } catch (\Exception $ex) {
            return $ex;
            return redirect(route('admin.mainCategories'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
