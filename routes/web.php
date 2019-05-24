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

// Route::get('/', function () {
//     return view('layout');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'LayoutController@index');
Route::get('/detail', 'LayoutController@detail');

Route::resource('/admin','admin\AdminController');
Route::resource('/job-request','admin\AdminJobRequestController');
Route::post('/job-request-approval','admin\AdminJobRequestController@jobRequestApproval');
Route::resource('/cv-request','admin\AdminCvRequestController');
Route::post('/cv-approval','admin\AdminCvRequestController@cvApproval');


Route::resource('/user','user\UserController');
Route::get('/notification','user\UserController@notification');
Route::post('file/upload', 'FileController@upload')->name('file.upload');
Route::post('file/send', 'FileController@send')->name('file.send');
Route::get('file/upload', 'FileController@form')->name('file.form');
Route::get('file', 'FileController@index')->name('file.index');
Route::post('/job-request','user\UserController@jobRequest');

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('/jobs_user','jobs\JobsController@user');
    Route::resource('/jobs','jobs\JobsController');
   
});