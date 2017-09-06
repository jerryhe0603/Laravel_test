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
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/blog', 'BlogController@index')->name('blog');


Route::group(['prefix'=>'blog','middleware' => 'auth'], function(){
	
	Route::get('/', 'BlogController@index');
	Route::get('create', 'BlogController@create');
	Route::post('/', 'BlogController@store');
	Route::get('{id}', 'BlogController@show');
	Route::get('{id}/edit', 'BlogController@edit');
	Route::put('{id}', 'BlogController@update');
	Route::get('{id}/delete', 'BlogController@destroy');
});





