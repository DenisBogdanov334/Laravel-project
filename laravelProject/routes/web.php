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

Route::get('/', 'PagesController@index');

Route::get('/blog', 'PagesController@blog');

Route::get('/about', 'PagesController@about');

Route::resource('posts', 'PostController');

Route::get('profile', 'UserController@profile');

Route::post('profile','UserController@update_avatar');

Route::get('users/export', 'UserController@export');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
