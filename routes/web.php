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

//Route::group(['prefix' => 'admin/assets', 'middleware' => 'auth'], function() {
//    Route::get('/', 'AssetController@index')->name('assets.index');
//
//    Route::get('/add', 'AssetController@create')->name('assets.create');
//    Route::post('/', 'AssetController@store')->name('assets.store');
//    Route::get('/{asset}', 'AssetController@show')->name('assets.show');
//    Route::get('/{asset}/list', 'AssetController@showList')->name('assets.showList');
//    Route::get('/{asset}/edit', 'AssetController@edit')->name('assets.edit');
//    Route::put('/{asset}', 'AssetController@update')->name('assets.update');
//    Route::delete('/{asset}', 'AssetController@destroy')->name('assets.destroy');
//});

// Department Management
//Route::group(['prefix' => 'admin/departments', 'middleware' => 'auth'], function() {
//    Route::get('/', 'DepartmentController@index')->name('departments.index');
//    Route::get('list', 'DepartmentController@list')->name('departments.list');
//    Route::get('add', 'AssetController@create')->name('departments.create');
//    Route::post('/', 'DepartmentController@store')->name('departments.store');
//    Route::get('{department}/edit', 'DepartmentController@edit')->name('departments.edit');
//    Route::put('{department}', 'DepartmentController@update')->name('departments.update');
//    Route::post('{department}', 'DepartmentController@destroy')->name('departments.destroy');
//});

// Location Management
//Route::group(['prefix' => 'admin/location', 'middleware' => 'auth'], function() {
//    Route::view('/', 'admin.location.list')->name('location.index');
//    Route::view('add', 'admin.location.add')->name('location.add');
//    Route::get('{id}/detail', 'LocationController@getDetail')->name('location.detail');
//    Route::get('{id}/list', 'LocationController@getDetailList')->name('location.detailList');
//    Route::get('list', 'LocationController@getList')->name('location.list');
//    Route::post('add', 'LocationController@postAdd');
//    Route::get('{id}/edit', 'LocationController@getEdit')->name('location.edit');
//    Route::put('{id}/edit', 'LocationController@putUpdate');
//    Route::post('{id}', 'LocationController@postDelete');
//});

// Asset Model Management
//Route::group(['prefix' => 'admin/model', 'middleware' => 'auth'], function() {
//    Route::view('/', 'admin.model.list')->name('model.index');
//    Route::get('add', 'AssetModelController@getAdd')->name('model.add');
//    Route::get('{id}/detail', 'AssetModelController@getDetail')->name('model.detail');
//    Route::get('{id}/list', 'AssetModelController@getDetailList')->name('model.detailList');
//    Route::post('add', 'AssetModelController@postAdd');
//    Route::get('list', 'AssetModelController@getList')->name('model.list');
//    Route::get('{id}/edit', 'AssetModelController@getEdit')->name('model.edit');
//    Route::put('{id}/edit', 'AssetModelController@putUpdate');
//    Route::post('{id}', 'AssetModelController@postDelete');
//});

// Vendor Management
//Route::group(['prefix' => 'admin/vendor', 'middleware' => 'auth'], function() {
//    Route::view('/', 'admin.vendor.list')->name('vendor.index');
//    Route::view('add', 'admin.vendor.add')->name('vendor.add');
//    Route::get('{id}/detail', 'VendorController@getDetail')->name('vendor.detail');
//    Route::get('{id}/list', 'VendorController@getDetailList')->name('vendor.detailList');
//    Route::get('list', 'VendorController@getList')->name('vendor.list');
//    Route::post('add', 'VendorController@postAdd');
//    Route::get('{id}/edit', 'VendorController@getEdit')->name('vendor.edit');
//    Route::put('{id}/edit', 'VendorController@putUpdate');
//    Route::post('{id}', 'VendorController@postDelete');
//});

// Order Management
//Route::group(['prefix' => 'admin/order', 'middleware' => 'auth'], function() {
//    Route::view('/', 'admin.order.list')->name('order.index');
//    Route::get('add', 'OrderController@getAdd')->name('order.add');
//    Route::post('add', 'OrderController@postAdd');
//    Route::get('list', 'OrderController@getList')->name('order.list');
//    Route::get('{id}/edit', 'OrderController@getEdit')->name('order.edit');
//    Route::put('{id}/edit', 'OrderController@putUpdate');
//    Route::post('{id}', 'OrderController@postDelete');
//});
