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

Route::get('/', function () {
    return view('admin.login.login');
});

Auth::routes();

Route::group(['namespace' => 'Admin', 'middleware' => ['auth','admin'] ], function(){

	Route::get('/admin/dashboard','DashboardController@index')->name('admin.dashboard');

Route::prefix('admin')->group(function(){
	Route::get('/profile/view', 'ProfileController@view')->name('profile.view');
	Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
	Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
	Route::get('/password/view', 'ProfileController@passwordView')->name('profile.password.view');
	Route::post('/password/update', 'ProfileController@passwordUpdate')->name('profile.password.update');
});

Route::prefix('department')->group(function(){
	Route::get('/view', 'DepartmentController@view')->name('department.view');
	Route::get('/add', 'DepartmentController@add')->name('department.add');
	Route::post('/store', 'DepartmentController@store')->name('department.store');
	Route::get('/edit/{id}', 'DepartmentController@edit')->name('department.edit');
	Route::post('/update/{id}', 'DepartmentController@update')->name('department.update');
	Route::get('/delete/{id}', 'DepartmentController@delete')->name('department.delete');
});

Route::prefix('student')->group(function(){
	Route::get('/view', 'StudentController@view')->name('student.view');
	Route::get('/add', 'StudentController@add')->name('student.add');
	Route::post('/store', 'StudentController@store')->name('student.store');
	Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
	Route::post('/update/{id}', 'StudentController@update')->name('student.update');
	Route::get('/inactive/{id}', 'StudentController@inactive')->name('student.inactive');
	Route::get('/active/{id}', 'StudentController@active')->name('student.active');
	Route::get('/details/{id}', 'StudentController@details')->name('student.details');
	Route::get('/delete/{id}', 'StudentController@delete')->name('student.delete');
	//another section
	Route::get('/dept-wise', 'StudentController@deptWise')->name('dept.wise');
	Route::get('/dept-wise/view/{id}', 'StudentController@deptWiseView')->name('dept.wise.view');
});

Route::prefix('teacher')->group(function(){
	Route::get('/view', 'TeacherController@view')->name('teacher.view');
	Route::get('/add', 'TeacherController@add')->name('teacher.add');
	Route::post('/store', 'TeacherController@store')->name('teacher.store');
	Route::get('/edit/{id}', 'TeacherController@edit')->name('teacher.edit');
	Route::post('/update/{id}', 'TeacherController@update')->name('teacher.update');
	Route::get('/details/{id}', 'TeacherController@details')->name('teacher.details');
	Route::get('/delete/{id}', 'TeacherController@delete')->name('teacher.delete');
});


});

//student part
Route::group(['namespace' => 'Student', 'middleware' => ['auth','student'] ], function(){

	Route::get('/student/dashboard','DashboardController@index')->name('student.dashboard');
	
Route::prefix('student')->group(function(){
	Route::get('/profile/view', 'ProfileController@studentView')->name('student.profile.view');
	Route::get('/profile/edit', 'ProfileController@studentEdit')->name('student.profile.edit');
	Route::post('/profile/update', 'ProfileController@studentUpdate')->name('student.profile.update');
	Route::get('/password/view', 'ProfileController@studentPasswordView')->name('student.profile.password.view');
	Route::post('/password/update', 'ProfileController@studentPasswordUpdate')->name('student.profile.password.update');
});


});
