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
	Route::namespace('Admin')->group(function () {
		Route::get('/', 'HomeController@index')->name('admin.main');

		Route::get('/roles/list', 'RoleController@index')->name('role.list');
		Route::get('/roles/form', 'RoleController@form')->name('role.form');

		Route::get('/users/list', 'UserController@index')->name('user.list');
		Route::post('users/store', 'UserController@store')->name('user.store');
		Route::post('users/update', 'UserController@update')->name('user.update');
		Route::get('/users/form', 'UserController@form')->name('user.form');
		Route::get('/users/form/{id}', 'UserController@edit')->name('user.edit');

		Route::get('/majors/list', 'MajorController@index')->name('major.list');
		Route::post('majors/store', 'MajorController@store')->name('major.store');
		Route::post('majors/update', 'MajorController@update')->name('major.update');
		Route::get('/majors/form', 'MajorController@form')->name('major.form');
		Route::get('/majors/form/{id}', 'MajorController@edit')->name('major.edit');

		Route::get('/targets/list', 'TargetController@index')->name('target.list');
		Route::post('targets/store', 'TargetController@store')->name('target.store');
		Route::post('targets/update', 'TargetController@update')->name('target.update');
		Route::get('/targets/form', 'TargetController@form')->name('target.form');
		Route::get('/targets/form/{id}', 'TargetController@edit')->name('target.edit');

		Route::get('/difficulties/list', 'DifficultyController@index')->name('difficulty.list');
		Route::post('difficulties/store', 'DifficultyController@store')->name('difficulty.store');
		Route::post('difficulties/update', 'DifficultyController@update')->name('difficulty.update');
		Route::get('/difficulties/form', 'DifficultyController@form')->name('difficulty.form');
		Route::get('/difficulties/form/{id}', 'DifficultyController@edit')->name('difficulty.edit');

		Route::get('/schedules/list', 'ScheduleController@index')->name('schedule.list');
		Route::get('/schedules/update', 'ScheduleController@update')->name('schedule.update');
	});
});

Route::prefix('mentor')->group(function () {
	Route::namespace('Mentor')->group(function () {
		Route::get('/', 'HomeController@index')->name('mentor.main');

		Route::get('/schedules/all', 'ScheduleController@index')->name('mentor.schedule.all');
		Route::get('/schedules/request', 'ScheduleController@form')->name('mentor.schedule.request');
		Route::post('/schedules/store', 'ScheduleController@store')->name('mentor.schedule.store');
	});
});

Route::prefix('student')->group(function () {
	Route::namespace('Student')->group(function () {
		Route::get('/', 'HomeController@index')->name('student.main');
	});
});