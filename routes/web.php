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

Route::get('/', 'WellComeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostsController');
Route::resource('category', 'CategoriesController');
Route::resource('tag', 'TagsController');
Route::get('trashed', 'PostsController@trashed')->name('trashed.index');
