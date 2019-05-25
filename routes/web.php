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


// @create以下はログイン後じゃないと見れないページ
Route::group(['middleware' => 'auth'],function(){
	Route::get('diary/create','DiaryController@create')->name('diary.create'); //投稿画面　画面を表示するため

	Route::post('diary/create','DiaryController@store')->name('diary.create'); //保存処理　Ppost送信　store メソッド呼び出して保存する


	Route::delete('diary/{id}/delete', 'DiaryController@destroy')->name('diary.destroy');// 削除機能
//{}の中は、対応するメソッドの因数による
});






// restful って検索したら、なんで同じ名前でgetとpostの違いがあるかとかわかるかも！

// RESETFul設計
// get 取得　　　　（データ取ってきて表示）
// POST 作成　　　　（登録）
// patch 更新
// delete 削除





// Route::get('/', function () {
//     return view('welcome');
// });


// php artisan make:authコマンド叩くことで追加される
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
















