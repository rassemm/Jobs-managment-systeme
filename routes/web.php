<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.master');
});
Route::get('/homee', function () {
    return view('dachboard.dach');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
//     Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

   

    Route::view('/home', 'home')->middleware('auth');
   




    Auth::routes();
   
Route::group(['middleware' => 'role:admin'], function() {
    Route::resource('admin/permission', 'Admin\PermissionController');
    Route::resource('admin/permission', 'Admin\PermissionController');
    Route::resource('admin/role', 'Admin\RoleController');
    Route::resource('admin/job','JobController');
    Route::resource('admin/post','PostController');
    Route::resource('admin/user','UserController');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::view('/admin', 'admins.index');
    Route::get('/front', 'FrontController@index');
    Route::get('logout', 'UserController@logout')->name('logout');;
});
Route::group(['middleware' => 'role:recruteur'], function() {
    Route::resource('/job','JobController');
    Route::resource('/post','PostController');
});
