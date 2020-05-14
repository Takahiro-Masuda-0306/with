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

Route::get('/', 'ToppagesController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('posts', 'PostsController', ['only' => ['show', 'create', 'store']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('posts', 'PostsController@update')->name('posts.update');
        Route::get('posts', 'PostsController@destroy')->name('posts.destroy');
        Route::get('approve', 'FavoritesController@store')->name('favorites.approve');
        Route::get('disapprove', 'FavoritesController@destroy')->name('favorites.disapprove');
        Route::post('comment', 'CommentsController@store')->name('comments.store');
        Route::put('comment', 'CommentsController@update')->name('comments.update');
        Route::get('uncomment', 'CommentsController@destroy')->name('comments.delete');
        Route::get('approvings', 'UsersController@approvings')->name('users.approvings');
        Route::get('commentings', 'UsersController@commentings')->name('users.commentings');
    });
});

