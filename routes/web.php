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
Route::get('/', 'PostsController@index');
Route::get('/home', 'PostsController@index');
Route::get('/{slug}', 'PostsController@show')->where('slug', '[A-Za-z0-9-_]+');
Route::group(['middleware' => ['auth']], function() {
	Route::post('comment/add','CommentsController@store');
	Route::get('admin/index', 'PostsController@indexDashboard');
	Route::resource('admin/posts/', 'Auth\PostsController');
	Route::get('admin/posts/allposts', 'Auth\PostsController@index');
	Route::get('admin/posts/new-post', 'Auth\PostsController@create');
	Route::post('admin/posts/createpost', 'Auth\PostsController@store');
	Route::get('admin/posts/editpost/{slug}', 'Auth\PostsController@edit');
	Route::post('admin/posts/updatepost', 'Auth\PostsController@update');
	Route::get('admin/posts/deletepost/{id}', 'Auth\PostsController@destroy');




});


