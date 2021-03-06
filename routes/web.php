<?php
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/pdf','BookController@pdf');
Route::get('/temp/{id}', function (\Illuminate\Http\Request $request) {
    if (!$request->hasValidSignature()){
        abort(401);
    }
})->name('temp');

Route::get('/', 'BookController@home');
Route::get('/search', 'BookController@search');
Route::put('/userEdit', 'HomeController@edit');
Route::get('/userEdit', 'HomeController@show');
Route::get('/createPost', 'HomeController@createPost');
Route::get('/emailAdmin', 'HomeController@emailAdmin');
Route::post('/emailAdmin', 'HomeController@email');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

//list of book
Route::get('/list', 'ListController@index');
Route::post('/list/store', 'ListController@store');
Route::get('/listBook/{id}', 'ListController@listBook');
Route::get('/showBook/{id}', 'BookController@showBook');

//book url
Route::post('/book/{id}/store', 'BookController@store');
Route::get('/author/{name}', 'BookController@author');

//comment url
Route::post('/comment/book/{id}', 'CommentController@store');
Route::put('/comment/{id}', 'CommentController@update');
Route::delete('/comment/delete/{id}', 'CommentController@commentDelete');
Route::delete('/forum/delete/{id}', 'CommentController@forumDelete');

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
Route::put('/forum/{id}', 'ForumController@update');

//dashboard url
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts-dashboard.home');
    });
    Route::get('/dashboard/posts', function () {
        return view('layouts-dashboard.posts');
    });
    Route::get('/dashboard/comments', function () {
        return view('layouts-dashboard.comments');
    });
    Route::get('/favoriteBook', function () {

        return view('layouts-dashboard.favoriteBook');
    });
    Route::get('/notifications', function () {

        return view('layouts-dashboard.notifications');
    });

    //favorites

    Route::get('/favoriteBook/{id}', 'FavoriteController@favoriteBook');
    Route::get('/unfavoriteBook/{id}', 'FavoriteController@unfavoriteBook');

    //like
    Route::get('/likeComment/{id}', 'LikeController@likeComment');
    Route::get('/unlikeComment/{id}', 'LikeController@unlikeComment');
});

//admin panel
/*
 * ToDo : add middleware for routes
 */

Route::get('/adminPanel', function () {
    return view('adminPanel.layout');
});

Route::get('/adminPanel/users', 'AdminController@admin_users');

Route::post('/user/{id}', 'AdminController@editUser');
Route::delete('/user/{id}', 'AdminController@deleteUser');

Route::fallback(function () {
    return \Illuminate\Support\Facades\Redirect::to('/',301); // انتقال به صفحه اصلی سایت
});
