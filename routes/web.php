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
//      Test Routs




Route::get('/', function () {
    return view('adminViews.dashboard');
});

Route::get('/profile', function () {
    return view('users.userprofile');
});

//End of test

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->middleware(['auth','AuthorRole'])->group(function (){
   Route::resource('/users' , 'UsersController' , ['except'=>['create' , 'store' , 'show']]);
});

Route::namespace('User')->middleware('auth')->group(function (){
   Route::resource('/user' , 'UserController' ,['except' =>['index' , 'create' , 'store','destroy']]);
});

Route::namespace('Category')->group(function(){
    Route::resource('/category' , 'CategoryController' , ['except'=>['create' , 'edit']]);
});

Route::namespace('Book')->group(function(){
   Route::resource('/book' , 'BookController');
    Route::get('/search' , 'BookController@search')->name('search');
});


//Route::namespace('Comment')->group(function() {
//   Route::resource('/comment' , 'CommentController');
//});

Route::namespace('Comment')->group(function () {
   Route::post('comment/{book}' , 'CommentController@store')->name('comment.store');
   Route::Patch('/Comment/{comment}' , 'CommentController@update')->name('comment.update');
   Route::delete('/Comment/{comment}' , 'CommentController@destroy')->name('comment.destroy');
//   Route::resource('/comment' , 'CommentController');
});






