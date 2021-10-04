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

define('PAGINATION_COUNT', '10');

Route::domain('ecommerce.com')->group(function () {
    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        // Languages Route
        Route::group(['prefix' => 'languages'], function () {
            // Show
            Route::get('/', 'LanguagesController@index')->name('admin.languages');

            //Create
            Route::get('/create', 'LanguagesController@create')->name('admin.languages.create');
            Route::post('/store', 'LanguagesController@store')->name('admin.languages.store');

            // Edit
            Route::get('/edit/{id}', 'LanguagesController@edit')->name('admin.languages.edit');
            Route::post('/update/{id}', 'LanguagesController@update')->name('admin.languages.update');

            // Delete
            Route::get('/delete/{id}', 'LanguagesController@destroy')->name('admin.languages.delete');

            // Change status
            Route::get('/changeStatus/{id}', 'LanguagesController@changeStatus')->name('admin.languages.status');
        });

        // Main Categories Routes
        Route::group(['prefix' => 'main_categories'], function () {
            // Show
            Route::get('/', 'MainCategoriesController@index')->name('admin.mainCategories');

            // Create
            Route::get('/create', 'MainCategoriesController@create')->name('admin.mainCategories.create');
            Route::post('/store', 'MainCategoriesController@store')->name('admin.mainCategories.store');

            // Edit
            Route::get('/edit/{id}', 'MainCategoriesController@edit')->name('admin.mainCategories.edit');
            Route::post('/update/{id}', 'MainCategoriesController@update')->name('admin.mainCategories.update');

            // Delete
            Route::get('/delete/{id}', 'MainCategoriesController@destroy')->name('admin.mainCategories.delete');

            // Change status
            Route::get('/changeStatus/{id}', 'MainCategoriesController@changeStatus')->name('admin.mainCategories.status');
        });

        // Sub Categories Routes
        Route::group(['prefix' => 'sub_categories'], function () {
            // Show
            Route::get('/', 'SubCategoriesController@index')->name('admin.subCategories');

            // Create
            Route::get('/create', 'SubCategoriesController@create')->name('admin.subCategories.create');
            Route::post('/store', 'SubCategoriesController@store')->name('admin.subCategories.store');

            // Edit
            Route::get('/edit/{id}', 'SubCategoriesController@edit')->name('admin.subCategories.edit');
            Route::post('/update/{id}', 'SubCategoriesController@update')->name('admin.subCategories.update');

            // Delete
            Route::get('/delete/{id}', 'SubCategoriesController@destroy')->name('admin.subCategories.delete');

            // Change status
            Route::get('/changeStatus/{id}', 'SubCategoriesController@changeStatus')->name('admin.subCategories.status');
        });

        // Vendors Routes
        Route::group(['prefix' => 'vendors'], function () {
            // Show
            Route::get('/', 'VendorController@index')->name('admin.vendors');

            // Create
            Route::get('/create', 'VendorController@create')->name('admin.vendors.create');
            Route::post('/store', 'VendorController@store')->name('admin.vendors.store');

            // Edit
            Route::get('/edit/{id}', 'VendorController@edit')->name('admin.vendors.edit');
            Route::post('/update/{id}', 'VendorController@update')->name('admin.vendors.update');

            // Delete
            Route::get('/delete/{id}', 'VendorController@destroy')->name('admin.vendors.delete');

            // Change status
            Route::get('/changeStatus/{id}', 'VendorController@changeStatus')->name('admin.vendors.status');
        });

        // Products Routes
        Route::group(['prefix' => 'products'], function () {
            // Show
            Route::get('/', 'ProductsController@index')->name('admin.products');

            // Create
            Route::get('/create', 'ProductsController@create')->name('admin.products.create');
            Route::post('/store', 'ProductsController@store')->name('admin.products.store');

            // Edit
            Route::get('/edit/{id}', 'ProductsController@edit')->name('admin.products.edit');
            Route::post('/update/{id}', 'ProductsController@update')->name('admin.products.update');

            // Delete
            Route::get('/delete/{id}', 'ProductsController@destroy')->name('admin.products.delete');

            // Change status
            Route::get('/changeStatus/{id}', 'ProductsController@changeStatus')->name('admin.products.status');
        });
    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('get.admin.login');
        Route::post('/login', 'LoginController@login')->name('admin.login');
    });
});
