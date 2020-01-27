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

Route::get('/', 'BookController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//list of book
Route::get('/list', 'ListController@index');
Route::get('/listBook/{id}', 'ListController@listBook');
Route::get('/showBook/{id}','BookController@showBook' );
