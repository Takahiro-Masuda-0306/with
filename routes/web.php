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
    Route::resource('posts', 'PostsController', ['only' => ['show', 'create', 'store', 'destroy']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::post('approve', 'FavoritesController@store')->name('favorites.approve');
        Route::delete('disapprove', 'FavoritesController@destroy')->name('favorites.disapprove');
        Route::get('approvings', 'UsersController@approvings')->name('users.approvings');
        Route::get('approvers', 'PostsController@approvers')->name('posts.approvers');
    });
});

