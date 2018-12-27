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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('user.main');
Route::prefix('admin')->group(function () {
	Route::get('/', 'HomeController@index')->name('admin.main');

	Route::get('/roles/list', 'Admin\RoleController@index')->name('role.main');
	Route::get('/roles/form', 'Admin\RoleController@index')->name('role.main');
}); 