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
})->middleware('auth');
Route::get('/homee', function () {
    return view('dachboard.dach');
})->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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
    Route::put('/approve/{uid}/{id}','JobController@approve')->name('approve');
    Route::put('/unapprove/{uid}/{id}','JobController@unapprove')->name('unapprove');
    // Route::put('/approve/{uid}/{id}','PostController@approve')->name('approve');
    // Route::put('/unapprove/{uid}/{id}','PostController@unapprove')->name('unapprove');
    // Route::put('/subscribe/{id}','PostController@subscribe')->name('subscribe');
});
Route::group(['middleware' => 'role:recruteur'], function() {
    Route::resource('/job','JobController');
    Route::resource('/post','PostController');
    Route::put('/approve/{uid}/{id}','JobController@approve')->name('approve');
    Route::put('/unapprove/{uid}/{id}','JobController@unapprove')->name('unapprove');
});

Route::group(['middleware' => 'role:user'], function() {
    Route::resource('/job','JobController');
    Route::resource('/post','PostController');


    Route::get('logout', 'UserController@logout')->name('logout');;
    Route::put('/approve/{uid}/{id}','JobController@approve')->name('approve');
    Route::put('/unapprove/{uid}/{id}','JobController@unapprove')->name('unapprove');
});

// Route::put('/subscribe/{id}','PostController@subscribe')->name('subscribe');
 Route::put('/approve/{uid}/{id}','PostController@approve')->name('approvepost');
Route::put('/unapprove/{uid}/{id}','PostController@unapprove')->name('unapprovepost');
//Route::put('/subscribe/{id}','PostController@subscribe')->name('subscribe');
 Route::get('/myjob','JobController@myJobs')->name('myjobs');
 Route::get('/mypost','PostController@myPosts')->name('myposts');


Route::prefix('job')->group(function(){
    //Route::get('/myjob','JobController@myJobs')->name('myjobs');
    Route::put('/subscribe/{id}','JobController@subscribe')->name('subscribe');
    Route::get('/{id}','JobController@show');
  });

  Route::prefix('post')->group(function(){
    //Route::get('/mypost','PostController@myPosts')->name('myposts');
    Route::put('/subscribe/{id}','PostController@subscribe')->name('subscribepost');
    Route::get('/{id}','PostController@show');
  });