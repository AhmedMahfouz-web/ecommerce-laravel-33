<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategories;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
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
        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        return view('dashboard.pages.vendors.create', compact('categories'));
    }

    public function store(VendorRequest $request)
    {
        try {
            if ($request->has('img')) {
                $filePath = uploadImg('vendors', $request->img);
                $request->request->add(['logo' => $filePath]);
            }

            // Insert into database
            DB::beginTransaction();
            Vendor::create($request->except(['_token', 'img']));
            DB::commit();

            return redirect()->route('admin.vendors')->with(['success' => 'New Vendor has been added successfully.']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
        } // End Try & Catch

    } // End Store Function

    public function edit($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return redirect()->route('admin.vendors')->with(['error' => 'This Vendor isn\'t correct.']);
        }

        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->get();
        return view('dashboard.pages.vendors.edit', compact('vendor', 'categories'));
    }

    public function update($id, VendorRequest $request)
    {
        try {
            $vendor = Vendor::find($id);

            if (!$vendor) {
                return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
            }

            if (!$request->has('active')) {
                $request->request->add(['active' => 0]);
            }

            // Upload img
            $filePath = $vendor->logo;
            if ($request->has('img')) {
                $filePath = uploadImg('vendors', $request->img);
            }
            $request->request->add(['logo' => $filePath]);


            $vendor->update($request->except(['_token', 'img'])); // Update Vendor

            return redirect()->route('admin.vendors')->with(['success' => 'Vendor has been updated succesfully.']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.vendors')->with(['error' => 'Somthing went wrong try again later.']);
        }
    } // End Update Function


    // Delete Vendor
    public function destroy($id)
    {
        try {
            $vendor = Vendor::find($id);

            $vendor->delete();

            return redirect(route('admin.vendors'))->with(['success' => 'Vendor has been deleted successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.vendors'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
