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
Route::get('/test',function (){
    return view('test');
});
Route::get('/', 'BookController@home');
Route::get('/search', 'BookController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//list of book
Route::get('/list', 'ListController@index');
Route::post('/list/store', 'ListController@store');
Route::get('/listBook/{id}', 'ListController@listBook');
Route::get('/showBook/{id}','BookController@showBook' );

//book url
Route::post('/book/{id}/store', 'BookController@store');
Route::get('/author/{name}', 'BookController@author');


//comment url
Route::post('/comment/book/{id}', 'CommentController@store');


//news url

Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@show');
Route::post('/news', 'NewsController@store');
Route::post('/news/comment/{id}', 'NewsController@comment');


//forum url

Route::get('/forum', 'ForumController@index');
Route::get('/forum/{id}', 'ForumController@show');
Route::post('/forum', 'ForumController@store');
Route::post('/forum/comment/{id}', 'CommentController@forum');
