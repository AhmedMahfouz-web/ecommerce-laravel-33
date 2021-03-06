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

Route::group(['namespace' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // Languages Route
    Route::group(['prefix' => 'languages'], function() {
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
    });

    // Main Categories Routes
    Route::group(['prefix' => 'main_categories'], function() {
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
    });
});

Route::group(['namespace' => 'admin', 'middleware' => 'guest:admin'], function() {
    Route::get('/login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.login');
});
