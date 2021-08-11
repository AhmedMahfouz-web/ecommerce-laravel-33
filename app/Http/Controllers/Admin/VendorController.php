<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategories;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use PDO;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::selection()->paginate(PAGINATION_COUNT);
        return view('dashboard.pages.vendors.index', compact('vendors'));
    }

    public function create()
    {
        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->active()->get();
        return view('dashboard.pages.vendors.create', compact('categories'));
    }

    public function store(VendorRequest $request)
    {
        try {

            // Check if the Category is inactive
            $category = MainCategories::select('active')->find($request->category_id);
            if ($category->active == 0) {
                return redirect()->route('admin.vendors')->with(['error' => 'The selected category isn\'t active.']);
            }

            // Upload img
            if ($request->has('img')) {
                $filePath = uploadImg('vendors', $request->img);
                $request->request->add(['logo' => $filePath]);
            }

            // Insert into database
            DB::beginTransaction();
            $vendor = Vendor::create($request->except(['_token', 'img']));

            // Notification::send($vendor, new VendorCreated($vendor));

            DB::commit();

            return redirect()->route('admin.vendors')->with(['success' => 'New Vendor has been added successfully.']);
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Try & Catch

    } // End Store Function

    public function edit($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return redirect()->route('admin.vendors')->with(['error' => 'This Vendor isn\'t correct.']);
        }

        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->active()->get();
        return view('dashboard.pages.vendors.edit', compact('vendor', 'categories'));
    }

    public function update($id, VendorRequest $request)
    {
        try {
            $vendor = Vendor::find($id);

            // Check if the Vendor is valid
            if (!$vendor) {
                return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
            }


            // // Check if active or inactive & if the Category that vendor belongs to is active or inactive
            // if (!$request->has('active')) {
            //     $request->request->add(['active' => 0]);
            // } elseif ($vendor->category->active == 0) {

            //     // Check if the Category is inactive
            //     $category = MainCategories::select('active')->find($request->category_id);
            //     if ($category->active == 0) {
            //         return redirect()->route('admin.vendors')->with(['error' => 'The selected category isn\'t active.']);
            //     }

            //     return redirect()->route('admin.vendors')->with(['error' => 'Can\'t activate vendor duo to the vendor\'s category isn\'t acitve.']);
            // }

            // Upload img
            $filePath = $vendor->logo;
            if ($request->has('img')) {
                $filePath = uploadImg('vendors', $request->img); // Upload new img
            }
            $request->request->add(['logo' => $filePath]);


            $vendor->update($request->except(['_token', 'img'])); // Update Vendor

            if ($request->has('img')) {
                unlink('../public/' . $vendor->photo); // Delete old img
            }

            return redirect()->route('admin.vendors')->with(['success' => 'Vendor has been updated succesfully.']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
        }
    } // End Update Function


    // Delete Vendor
    public function destroy($id)
    {
        try {
            $vendor = Vendor::find($id);

            $vendor->delete();

            unlink('../public/' . $vendor->photo); // delete img

            return redirect(route('admin.vendors'))->with(['success' => 'Vendor has been deleted successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.vendors'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $vendor = Vendor::find($id);

            if (!$vendor) {
                return redirect()->route('admin.vendors')->with(['error' => 'This category doesn\'t exist.']);
            }

            // Check if the Category is inactive
            $category = MainCategories::select('active')->find($vendor->category_id);
            if ($category->active == 0) {
                return redirect()->route('admin.vendors')->with(['error' => 'Vednor\'s category isn\'t active.']);
            } else {
                $status = $vendor->active == 1 ? 0 : 1;
                $vendor->update(['active' => $status]);
            }


            return redirect(route('admin.vendors'))->with(['success' => 'Category has been deleted successfully.']);
        } catch (\Exception $ex) {
            return redirect(route('admin.vendors'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
