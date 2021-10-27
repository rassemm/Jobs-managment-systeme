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
Route::get('/pdf', function () {
    return view('front.style');
});



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
    Route::get('/front', 'FrontController@index');
    Route::get('logout', 'UserController@logout')->name('logout');;
 
    Route::get('/downloadPDF/{id}','CvController@downloadPDF');
  
});
Route::group(['middleware' => 'role:recruteur'], function() {
    Route::resource('/job','JobController');
    Route::resource('/post','PostController');
    Route::get('/front', 'FrontController@index');
  
});

Route::group(['middleware' => 'role:user'], function() {
    Route::resource('/job','JobController');
    Route::resource('/post','PostController');

    Route::get('/front', 'FrontController@index');
    Route::get('logout', 'UserController@logout')->name('logout');;
   Route::put('/subscribe/{id}','JobController@subscribe')->name('subscribe');
   Route::put('/subscribe/{id}','PostController@subscribepost')->name('subscribepost');
  
});
Route::resource('cv', 'CvController', ['except' => [
    'show'
]]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'CvController@index');
    Route::post('/create','CvController@store');
    Route::get('/create', 'CvController@create');
    Route::get('/cv/{id}/delete', 'CvController@destroy');
    Route::get('/cv/show/{id}', 'CvController@show')->name('cv.show');
    Route::put('/cv/edit/{id}','CvController@update')->name('cv.update');
    //Route::get('/cv/{id}/edit', 'CvController@edit');
    
    });
 Route::get('/myjob','JobController@myJobs')->name('myjobs');
 Route::get('/send/{id}','JobController@send')->name('send');
 Route::get('/sendMail/{id}','postController@sendpost')->name('sendpost');
 Route::get('/sendMa','JobController@sendmessage')->name('sendmessage');
Route::get('/mypost','PostController@myPosts')->name('myposts');
// //tcopihom leha

Route::put('/approve/{uid}/{id}','PostController@approve')->name('approvepost');
Route::put('/unapprove/{uid}/{id}','PostController@unapprove')->name('unapprovepost');
Route::prefix('job')->group(function(){
    Route::put('/approve/{uid}/{id}','JobController@approve')->name('approve');
    Route::put('/unapprove/{uid}/{id}','JobController@unapprove')->name('unapprove');
   // Route::get('/myjob','JobController@myJobs')->name('myjobs');
    Route::put('/subscribe/{id}','JobController@subscribe')->name('subscribe');
    Route::get('/{id}','JobController@show');
  });

  Route::prefix('post')->group(function(){
   // Route::get('/mypost','PostController@myPosts')->name('myposts');
  
    Route::put('/subscribe/{id}','PostController@subscribepost')->name('subscribepost');
    Route::get('/{id}','PostController@show');
  });