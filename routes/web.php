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

// QR
Route::group(['middleware' => 'auth'], function () {
    Route::get('assets/barcode', 'AssetController@getBarcode')->name('assets.barcode');
    Route::get('assets/{id}/landing', 'AssetController@landing')->name('assets.landing');
});

// QR
Route::group(['middleware' => 'auth', 'prefix' => 'assets'], function () {
    Route::get('import', 'AssetController@getImport')->name('assets.import.index');
    Route::post('import', 'AssetController@postImport')->name('assets.import');
});

// Maintenance
Route::group(['middleware' => 'auth'], function () {
    Route::get('assets/{id}/maintenance/create', 'MaintenanceController@create')->name('maintenances.create');
    Route::post('assets/{id}/maintenance', 'MaintenanceController@store')->name('maintenances.store');
    Route::get('assets/{id}/maintenance/{maintenance_id}/edit', 'MaintenanceController@edit')->name('maintenances.edit');
    Route::put('assets/{id}/maintenance/{maintenance_id}', 'MaintenanceController@update')->name('maintenances.update');
});

// Bootstrap-Table list
Route::group(['middleware' => 'auth', 'prefix' => '/list'], function () {
    Route::get('assets', 'AssetController@list')->name('assets.list');
    Route::get('departments', 'DepartmentController@list')->name('departments.list');
    Route::get('locations', 'LocationController@list')->name('locations.list');
    Route::get('maintenances', 'MaintenanceController@list')->name('maintenances.list');
    Route::get('models', 'AssetModelController@list')->name('models.list');
    Route::get('vendors', 'VendorController@list')->name('vendors.list');
});

// Audit
Route::group(['middleware' => 'auth'], function () {
    Route::get('audit', 'AuditLogController@index')->name('audits.index');
});


// Assets list
Route::group(['middleware' => 'auth'], function () {
    Route::get('/assets/{id}/maintenances', 'MaintenanceController@maintenanceList')->name('assets.maintenances');
    Route::get('/assets/{id}/audits', 'AuditLogController@auditList')->name('assets.audits');
    Route::get('/departments/{id}/assets', 'DepartmentController@assetsList')->name('departments.assets');
    Route::get('/locations/{id}/assets', 'LocationController@assetsList')->name('locations.assets');
    Route::get('/models/{id}/assets', 'AssetModelController@assetsList')->name('models.assets');
    Route::get('/orders/{id}/assets', 'OrderController@assetsList')->name('orders.assets');
    Route::get('/vendors/{id}/assets', 'VendorController@assetsList')->name('vendors.assets');
});

// Managements
Route::group(['middleware' => 'auth'], function () {
    Route::resource('assets', 'AssetController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('locations', 'LocationController');
    Route::resource('models', 'AssetModelController');
    Route::resource('orders', 'OrderController');
    Route::resource('vendors', 'VendorController');
    Route::post('categories', 'CategoryController@store')->name('categories.store');
});
