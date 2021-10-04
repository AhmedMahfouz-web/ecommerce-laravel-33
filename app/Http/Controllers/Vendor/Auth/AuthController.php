<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\VendorRegistrationRequest;
use App\Models\MainCategories;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function get_registration()
    {
        $categories = MainCategories::select('name', 'id')->where('translation_lang', get_locale_language())->active()->get();
        return view('auth.register-vendor', compact('categories'));
    }

    public function registration(VendorRegistrationRequest $request)
    {
        try {
            $request->request->add(['token' => Str::random(32)]);
            $request->request->add(['slug' => str_replace(' ', '-', strtolower($request->name))]);
            $vendor = Vendor::create($request->except('_token'), ['token' => Str::random(32)]);
            return redirect()->route('admin.vendors')->with(['success', 'Your account has been created succesfully']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('get.vendor.register')->with(['error' => 'Somthing went wrong try again later']);
        }
    }

    public function get_set_password($subdomain)
    {
        $vendor = Vendor::where('slug', $subdomain)->first(['name', 'slug']);
        return view('vendor.auth.set_password', compact('vendor'));
    }

    public function set_password($subdomain, Request $request)
    {
        try {
            $vendor = Vendor::where('slug', $subdomain)->first();
            $vendor->password = Hash::make($request->password);
            $vendor->save();
            if (auth()->guard('vendor')->attempt(['email' => $vendor->email, 'password' => $request->input('password')])) {
                return redirect()->route('vendor.dashboard', $vendor->slug)->with(['success' => 'Logged in successfully']);
            }
        } catch (\Exception $ex) {
            return $ex;
            return view('vendor.auth.set_password', compact('subdomain'));
        }
    }

    public function get_login($subdomain)
    {
        $vendor = Vendor::where('slug', $subdomain)->first(['name', 'slug']);
        return view('vendor.auth.login', compact('vendor'));
    }

    public function login($subdomain, Request $request)
    {
        $vendor = Vendor::where('name', $subdomain)->first();
        if ($vendor->email == $request->input('email')) {

            if (auth()->guard('vendor')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->route('vendor.dashboard', $vendor->slug);
            }
        }

        return redirect()->back()->with(['error' => 'Credentials is uncorrect']);
    }
}
