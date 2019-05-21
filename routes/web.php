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

// URLは全部ここに定義！受付嬢に言ってないと知らないって言われる！

// get(引数１URLリクエスト　引数２対象コントローラー＠対象メソッド)
// URLリクエスト　が来た時に　対象コントローラー＠対象メソッドを！
Route::get('/', 'DiaryController@index')->name('diary.index'); //追加

Route::get('diary/create','DiaryController@create')->name('diary.create'); //投稿画面　画面を表示するため

Route::post('diary/create','DiaryController@store')->name('diary.create'); //保存処理　Ppost送信　store メソッド呼び出して保存する

// restful って検索したら、なんで同じ名前でgetとpostの違いがあるかとかわかるかも！

// Route::get('/', function () {
//     return view('welcome');
// });
