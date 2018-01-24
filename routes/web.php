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

Route::get('admin', 'AdminController@index')->name('admin.index');

Route::group(['prefix' => 'admin/asset', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.asset.list')->name('asset.index');
    Route::get('add', 'AssetController@getAdd')->name('asset.add');
    Route::get('list', 'AssetController@getList')->name('asset.list');
    Route::post('add', 'AssetController@postAdd');
    Route::get('{id}/edit', 'AssetController@getEdit')->name('asset.edit');
    Route::put('{id}/edit', 'AssetController@putUpdate');
    Route::post('{id}', 'AssetController@postDelete');
});

Route::group(['prefix' => 'admin/department', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.department.list')->name('department.index');
    Route::view('add', 'admin.department.add')->name('department.add');
    Route::get('list', 'DepartmentController@getList')->name('department.list');
    Route::post('add', 'DepartmentController@postAdd');
    Route::get('{id}/edit', 'DepartmentController@getEdit')->name('department.edit');
    Route::put('{id}/edit', 'DepartmentController@putUpdate');
    Route::post('{id}', 'DepartmentController@postDelete');
});

Route::group(['prefix' => 'admin/location', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.location.list')->name('location.index');
    Route::view('add', 'admin.location.add')->name('location.add');
    Route::get('list', 'LocationController@getList')->name('location.list');
    Route::post('add', 'LocationController@postAdd');
    Route::get('{id}/edit', 'LocationController@getEdit')->name('location.edit');
    Route::put('{id}/edit', 'LocationController@putUpdate');
    Route::post('{id}', 'LocationController@postDelete');
});

Route::group(['prefix' => 'admin/model', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.model.list')->name('model.index');
    Route::get('add', 'AssetModelController@getAdd')->name('model.add');
    Route::post('add', 'AssetModelController@postAdd');
    Route::get('list', 'AssetModelController@getList')->name('model.list');
    Route::get('{id}/edit', 'AssetModelController@getEdit')->name('model.edit');
    Route::put('{id}/edit', 'AssetModelController@putUpdate');
    Route::post('{id}', 'AssetModelController@postDelete');
});

Route::group(['prefix' => 'admin/vendor', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.vendor.list')->name('vendor.index');
    Route::view('add', 'admin.vendor.add')->name('vendor.add');
    Route::get('list', 'VendorController@getList')->name('vendor.list');
    Route::post('add', 'VendorController@postAdd');
    Route::get('{id}/edit', 'VendorController@getEdit')->name('vendor.edit');
    Route::put('{id}/edit', 'VendorController@putUpdate');
    Route::post('{id}', 'VendorController@postDelete');
});

//Route::group(['prefix' => 'admin/order', 'middleware' => 'auth'], function() {
//    Route::view('/', 'admin.order.list')->name('order.index');
//    Route::get('add', 'OrderController@getAdd')->name('order.add');
//    Route::post('add', 'OrderController@postAdd');
//    Route::get('list', 'OrderController@getList')->name('order.list');
//    Route::get('{id}/edit', 'OrderController@getEdit')->name('order.edit');
//    Route::put('{id}/edit', 'OrderController@putUpdate');
//    Route::post('{id}', 'OrderController@postDelete');
//});
