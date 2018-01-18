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