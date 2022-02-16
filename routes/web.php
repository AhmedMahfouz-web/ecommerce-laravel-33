<?php

use App\Http\Controllers\HomeController;
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

Route::domain(env('APP_URL'))->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/cart', 'CartController@index');
    Route::get('/add_to_cart/{product}', 'CartController@add_to_cart')->name('add_to_cart');

    Route::get('/product/{product}', [HomeController::class, 'product'])->name('product');

    Route::get('/cart', [HomeController::class, 'get_cart'])->name('get_cart');


    Route::group(['prefix' => 'vendor'], function () {
        //Vendor Registraiton
        Route::group(['namespace' => 'Vendor'], function () {
            Route::get('register', 'Auth\AuthController@get_registration')->name('get.vendor.registration');
            Route::post('register', 'Auth\AuthController@registration')->name('vendor.registration');
        });

        // Verify
        Route::group(['namespace' => 'admin'], function () {
            Route::get('vendors/verify/{id}', 'VendorController@verify')->name('admin.vendors.verify');
            Route::get('vendors/verify/{name}/{token}', 'VendorController@verified')->name('admin.vendors.verified');
        });
    });
});
