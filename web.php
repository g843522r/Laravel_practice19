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

// テキストに沿ってここからRoutingを定義200705
// PHP/Laravel 13よりさらに追記(@createへのルーティングを追加)
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('news/create', 'Admin\NewsController@add');
  Route::post('news/create', 'Admin\NewsController@create'); #追記200715
});

// PHP/Laravel 09 課題4より設定
// PHP/Laravel 13 課題3よりpostメソッドを追加
// さらにprefixでgroup化するように記述を修正200717
Route::group(['prefix' => 'admin'], function() {
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/edit', 'Admin\ProfileController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ログイン画面にリダイレクトする設定を追加200711(PHP/Laravel 12)
//さらに「profile/create」と「profile/edit」の設定も追加200714(PHP/Laravel 12 課題2,3)
//さらにmiddlewareのauthもグループ化するように記述を修正200717
//さらに「PHP/Laravel 15」よりadmin/newsを追加

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('news', 'Admin\NewsController@index');
  Route::get('news/create', 'Admin\NewsController@add');
  
  Route::get('news/edit', 'Admin\NewsController@edit');
  Route::post('news/edit', 'Admin\NewsController@update');
  Route::get('news/delete', 'Admin\NewsController@delete');
  
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/edit', 'Admin\ProfileController@update');
});

//「PHP/Laravel 19」よりフロントページへのルーティングを追記
Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');