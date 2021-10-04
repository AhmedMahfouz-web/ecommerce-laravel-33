<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Languages;
use App\Models\MainCategories;

class SubCategoriesController extends Controller
{
    // Get Categories
    public function index()
    {
        $locale_language = get_locale_language();
        $sub_categories = SubCategories::where('translation_lang', $locale_language)->Selection()->paginate(25);

        return view('dashboard.pages.sub_categories.index', compact('sub_categories'));
    } // End Index function


    // Get Create Page
    public function create()
    {
        $main_categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        $sub_categories = SubCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        return view('dashboard.pages.sub_categories.create', compact(['main_categories', 'sub_categories']));
    } // End Create function


    // Save Category
    public function store(SubCategoryRequest $request)
    {

        try {
            // Filter Request
            $sub_categories = collect($request->category); // to filter categories
            $default_category = $sub_categories->filter(function ($value, $key) {
                return $value['translation_lang'] == get_locale_language();
            });

            //Upload and Get Photo Name
            $filePath = "";
            if ($request->has("photo")) {
                $filePath = uploadImg('sub_category', $request->photo);
            }

            $active = 0;
            if ($request->has('active')) {
                $active = $request->active;
            }

            //Check Parent subCategory
            $parent_id = 0;
            if ($request->parent_id != null) {
                $parent_id = $request->parent_id;
            }

            $category_id = $request->main_category_id;

            DB::beginTransaction();

            // Insert into database
            $default_category_id = SubCategories::insertGetId([
                'translation_lang' => $default_category[0]['translation_lang'],
                'name' => $default_category[0]['name'],
                'slug' => str_replace(' ', '-', strtolower($default_category[0]['name'])),
                'category_id' => $category_id, // Main Category Id.
                'translation_of' => 0,
                'photo' => $filePath,
                'active' => $active,
                'parent_id' => $parent_id,
            ]);


            // Filter Request
            $categories = $sub_categories->filter(function ($value, $key) {
                return $value['translation_lang'] != get_locale_language();
            });

            //Check if there's another language
            if (isset($categories) && $categories->count()) {
                $arr = [];
                foreach ($categories as $index => $category) {

                    //Set arr values
                    $arr = [
                        'translation_lang' => $category['translation_lang'],
                        'name' => $category['name'],
                        'slug' => $category['name'],
                        'category_id' => $category_id, // Main Category Id.
                        'translation_of' => $default_category_id,
                        'active' => $active,
                        'photo' => $filePath,
                        'parent_id' => $parent_id,
                    ];

                    SubCategories::insert($arr);
                } // End foreach

            }

            DB::commit();

            return redirect()->route('admin.subCategories')->with(['success' => 'Category has been created successfully.']);
        } catch (\Exception $ex) {

            DB::rollback();
            return $ex;
            return redirect()->route('admin.subCategories')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Catch

    } // End Store Function


    public function edit($id)
    {
        $category = SubCategories::with('categories')->selection()->find($id);

        if (!$category) {
            return redirect()->route('admin.subCategories')->with(['error' => 'This category doesn\'t exist.']);
        }

        $main_categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        $sub_categories = SubCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        $languages = Languages::select('abbr', 'name')->active()->get();


        return view('dashboard.pages.sub_categories.edit', compact(['category', 'main_categories', 'sub_categories', 'languages']));
    } // End Edit Function


    public function update($id, SubCategoryRequest $request)
    {
        try {
            $sub_category = SubCategories::find($id);
            $languages_count = Languages::active()->count();

            // return $request;

            if (!$sub_category) {
                return redirect()->route('admin.subCategories')->with(['error' => 'This category doesn\'t exist.']);
            }

            $filePath = $sub_category->photo;
            if ($request->has('photo')) {
                $filePath = uploadImg('sub_category', $request->photo);
            }

            //Check Parent subCategory
            $parent_id = 0;
            if ($request->parent_id != null) {
                $parent_id == $request->parent_id;
            }

            $category = array_values($request->category);

            DB::beginTransaction();

            // Update default Language
            SubCategories::where('id', $id)->update([
                'name' => $category[0]['name'],
                'photo' => $filePath,
                'parent_id' => $parent_id,
            ]);

            // Update other languages
            if ($request->has('photo')) {
                $translation_languages = $sub_category->sub_sub_categories;
                foreach ($translation_languages as $index => $translation_lang)
                    $translation_lang->update([
                        'name' => $category[$index + 1]['name'],
                        'photo' => $filePath,
                        'parent_id' => $parent_id
                    ]);
            }

            // Set new languages
            $new_language = collect($request->new_category);
            $arr = [];
            for ($i = 0; $i < $languages_count; $i++) {
                if (isset($new_language[$i])) {
                    if ($new_language[$i]['name'] != null) {
                        $arr = [
                            'translation_lang' => $new_language[$i]['translation_lang'],
                            'name' => $new_language[$i]['name'],
                            'slug' => $new_language[$i]['name'],
                            'translation_of' => $id,
                            'active' => $sub_category->active,
                            'category_id' => $request->main_category_id,
                            'parent_id' => $parent_id,
                            'photo' => $sub_category->photo,
                        ];

                        SubCategories::insert($arr);
                    }
                }
            }


            DB::commit();

            if ($request->has('photo')) {
                unlink('../public/' . $sub_category->photo); // Delete old img
            }

            return redirect()->route('admin.subCategories')->with(['success' => 'Category has been updated successfully.']);
        } catch (\Exception $ex) {

            DB::rollback();
            return $ex;
            return redirect()->route('admin.subCategories')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Catch
    } // End Update Function

    public function destroy($id)
    {
        try {
            $category = SubCategories::find($id);

            if (!$category) {
                return redirect()->route('admin.subCategories')->with(['error' => 'This category doesn\'t exist.']);
            }

            if ($category->vendors && $category->vendors->count() > 0) {
                return redirect()->route('admin.subCategories')->with(['error' => 'Can\'t delete, This category has Vendors']);
            }

            unlink('../public/' . $category->photo); // delete img

            $category->delete();

            return redirect(route('admin.subCategories'))->with(['success' => 'Category has been deleted successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.subCategories'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $category = SubCategories::find($id);

            if (!$category) {
                return redirect()->route('admin.subCategories')->with(['error' => 'This category doesn\'t exist.']);
            }

            // Check if the Main Category is inactive
            if ($category->main_category->active == 0) {

                return redirect()->route('admin.subCategories')->with(['error' => 'Main Category isn\'t active.']);
            } else {

                if ($category->sub_categories) { // Check if SubCategory has Parent
                    if ($category->sub_categories->active == 1) { // Check if Parent is active
                        $status = $category->active == 1 ? 0 : 1;
                        $category->update(['active' => $status]);
                    } else {
                        return redirect()->route('admin.subCategories')->with(['error' => 'Sub Category isn\'t active.']);
                    }
                } else {

                    $status = $category->active == 1 ? 0 : 1;
                    $category->update(['active' => $status]);
                }
            }

            if ($status == 1) {
                return redirect(route('admin.subCategories'))->with(['success' => 'Category has been activated successfully.']);
            } else {
                return redirect(route('admin.subCategories'))->with(['success' => 'Category has been deactivated successfully.']);
            }
        } catch (\Exception $ex) {
            return $ex;
            return redirect(route('admin.subCategories'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
