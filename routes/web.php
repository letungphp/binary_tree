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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Post
Route::get('/posts', 'HomeController@index')->name('post.list');
Route::get('/posts/edit/{id}', 'HomeController@index')->name('post.edit');
Route::get('/posts/add', 'HomeController@index')->name('post.add');

//order
Route::get('/ordered', 'HomeController@index')->name('ordered');

//Account
Route::get('/profile', 'AccountController@profile')->name('account.profile');
Route::get('/setting', 'AccountController@setting')->name('account.setting');
Route::get('/activity', 'AccountController@activity')->name('account.activity');
Route::get('/support', 'AccountController@support')->name('account.support');


//Social signup - login
Route::get('/social/login-github', 'HomeController@index')->name('social.login.github');
Route::get('/social/login-gg', 'HomeController@index')->name('social.login.gg');
Route::get('/social/login-fb', 'HomeController@index')->name('social.login.fb');
Route::get('/social/signup-github', 'HomeController@index')->name('social.signup.github');
Route::get('/social/signup-gg', 'HomeController@index')->name('social.signup.gg');
Route::get('/social/signup-fb', 'HomeController@index')->name('social.signup.fb');

