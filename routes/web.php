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

// get(引数１URLリクエスト　引数２対象コントローラー＠対象メソッド)
// URLリクエスト　が来た時に　対象コントローラー＠対象メソッドを！
Route::get('/', 'DiaryController@index')->name('diary.index'); //追加

Route::get('diary/create', 'DiaryController@create')->name('diary.create'); //追加


// Route::get('/', function () {
//     return view('welcome');
// });
