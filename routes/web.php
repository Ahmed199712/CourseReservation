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

Auth::routes();

Route::get('/','FrontEndController@index')->name('user.index');
Route::get('/about','FrontEndController@about')->name('user.about');
Route::get('/contact','FrontEndController@contact')->name('user.contact');
Route::get('/services','FrontEndController@services')->name('user.services');

// Login Controller
Route::get('/login','MyLoginController@login')->name('login');
Route::post('/doLogin','MyLoginController@doLogin');
Route::any('/logout','MyLoginController@logout');

// Register Controller
Route::get('/register','myRegisterController@register')->name('user.register');
Route::post('/doRegister','myRegisterController@doRegister');

// Courses Controller ...
Route::get('/courses','CoursesController@index')->name('user.courses');
Route::get('/course/show/{id}','CoursesController@show')->name('course.show');
Route::get('/reservation/delete/{id}','CoursesController@destroy')->name('reservation.delete');
Route::get('/course/category/{id}','CoursesController@category')->name('course.category');
Route::get('/my-courses','CoursesController@myCourses')->name('user.mycourses');

// User Profile ..
Route::get('/my-profile' , 'UserController@myProfile')->name('user.profile');
Route::post('/my-profile/update' , 'UserController@updateProfile')->name('user.update.profile');

// Messages Controller ...
Route::post('sendMessage' , 'MessagesController@store')->name('user.message');

// Register Course ...
Route::get('/register-course/{id}' , 'CoursesController@registerCourse')->name('user.registerCourse');


// Comments Controller ..
Route::post('sendComment/{id}' , 'CommentsController@store')->name('user.comment');
