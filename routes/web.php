<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(config('APP_URL', env('APP_URL')))->group(function () {
    Route::get('/', function () {
        return view('front.home');
    });

    Route::get('/cart', 'CartController@index');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'vendor'], function () {
        Route::get('/vendor/register', 'Auth\AuthController@get_registration')->name('get.vendor.registration');
        Route::post('/vendor/register', 'Auth\AuthController@registration')->name('vendor.registration');
    });

    // Verify
    Route::get('admin/vendors/verify/{id}', 'Admin\VendorController@verify')->name('admin.vendors.verify');
    Route::get('admin/vendors/verify/{name}/{token}', 'Admin\VendorController@verified')->name('admin.vendors.verified');
});
