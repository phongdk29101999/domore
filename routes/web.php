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


/*Blog*/
Route::get('/posts','PostController@all_post');
Route::get('/posts/{post_id}','PostController@post_detail')->name('post.show');
Route::match(['GET','POST'],'/posts/{post_id}/comment','PostController@add_comment')->name('post.comment');
Route::get('/posts/tag/{tag_id}','PostController@post_tag');
Route::match(['GET','POST'],'/create_post','PostController@create');
Route::match(['GET','POST'],'/edit/{post_id}','PostController@edit');
Route::get('/posts/delete/{tag_id}','PostController@delete');
Route::get('/posts/{post_id}/react','PostController@react')->name('post.react');
Route::get('/my-posts','PostController@get_my_posts');

// Route::get('/posts/{post_id}/unactive-post','PostController@post_detail')->name('post.unlike');
// Route::get('/active-post/{post_id}','PostController@active_post');
// Route::get('/unactive-post/{post_id}','PostController@unactive_post');

/*User authen*/
Route::match(['GET','POST'],'/login','AuthController@login');
Route::match(['GET','POST'],'/register','AuthController@register');
Route::match(['GET','POST'],'/profiles','AuthController@profile');
Route::match(['GET','POST'],'/logout','Auth\LoginController@logout');

// Route::match(['GET','POST'],'/users/{id}','Auth\UserController@show');
// Route::match(['GET','POST'],'/change-pass','AuthController@change_pass');
Route::get('users/{id}','Auth\UserController@show');
Route::get('users/{id}/edit', 'Auth\UserController@edit')->middleware('require_same_user');
Route::match(['GET', 'POST'], 'users/{id}/update', 'Auth\UserController@update')->middleware('require_same_user');
Route::get('users/{user_id}/delete', 'AdminController@delete')->middleware('require_admin');
Route::get('users/{user_id}/posts', 'Auth\UserController@posts');

/*Admin route*/
Route::get('admin/home-page','AdminController@index')->middleware('require_admin');
// Route::match(['GET','POST'],'/admin-change-pass','AdminController@change_pass');
Route::get('/home-page','HomeController@homepage');


Auth::routes();
Route::get('/', 'HomeController@homepage')->name('home');

#search
Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/search-results', 'SearchController@search')->name('search.result');

#tag
Route::match(['GET','POST'],'tags/new','TagController@create')->middleware('require_admin');
Route::get('/tags/{tag_id}','TagController@show')->middleware('require_admin');
Route::match(['GET','POST'],'/tags/{tag_id}/edit','TagController@edit')->middleware('require_admin');
Route::get('/tags/delete/{tag_id}','TagController@delete')->middleware('require_admin');
