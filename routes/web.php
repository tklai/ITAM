<?php

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

// Redirect the root page to login page
Route::get('/', function () {
    return redirect('login');
});

/*
 * Show the login form and handle login/logout operation.
 * Registration and Password Reset is disabled.
 * Original code: Auth::routes();
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Admin Dashboard
Route::get('/', 'AdminController@index')->name('dashbaord');

// Asset Management
Route::group(['middleware' => 'auth'], function () {
    Route::resource('assets', 'AssetController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('locations', 'LocationController');
    Route::resource('models', 'AssetModelController');
    Route::resource('orders', 'OrderController');
    Route::resource('vendors', 'VendorController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('categories', 'CategoryController@store')->name('categories.store');
});

// Bootstrap-Table list
Route::group(['middleware' => 'auth', 'prefix' => '/list'], function () {
    Route::get('assets', 'AssetController@list')->name('assets.list');
    Route::get('departments', 'DepartmentController@list')->name('departments.list');
    Route::get('locations', 'LocationController@list')->name('locations.list');
    Route::get('models', 'AssetModelController@list')->name('models.list');
    Route::get('vendors', 'VendorController@list')->name('vendors.list');
});

// Assets list
Route::group(['middleware' => 'auth'], function () {
    Route::get('/departments/{id}/assets', 'DepartmentController@assetsList')->name('departments.assets');
    Route::get('/locations/{id}/assets', 'LocationController@assetsList')->name('locations.assets');
    Route::get('/models/{id}/assets', 'AssetModelController@assetsList')->name('models.assets');
    Route::get('/orders/{id}/assets', 'OrderController@assetsList')->name('orders.assets');
    Route::get('/vendors/{id}/assets', 'VendorController@assetsList')->name('vendors.assets');
});
