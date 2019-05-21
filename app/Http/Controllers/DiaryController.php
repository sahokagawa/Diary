<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// require_onceのイケてる版
use App\Diary;

// クラスの継承
// class　子クラス　extends 親クラス
// 親クラスの特徴は全部継承した上で、子クラスの特徴を追加できる
// ララベルにすでにあるControllerを継承した上でDiaryControllerを追加
// 中身は意識しすぎないこと
class DiaryController extends Controller
{
     public function index()
{
// dd("Hello Laravel");
// dump and die関数と言うLalavelに用意された関数
// ver_dumpとdieを組み合わせたもの
// die以下の処理は読み込まれない→確認したらddはコメントアウトか消す事！
// Lalavel必須ツール、事あるごとに打ちまくる事！！笑


				// モデルファイルを使ってデータを取得する　７行目
	$diaries = Diary::all()->toArray(); 
	//  Diaryクラス
	//急遽toArray()メソッドで配列にして見やすく！！
				// SELECT*FROM diaries WHERE  1を実行し$diariesを入れる(小文字複数形にしたテーブルができる)
				// allメソッドだけやと、見にくいかたら(Collectionで表示される)、toArray()メソッドで配列（Array)にチェインする
	// dd($diaries);     //確認

	// $diaries = Diary::find(1)->toArray();  こんなのもある！色々ある！




    	// return view('diaries.index');

			return view('diaries.index',["diaries" => $diaries]);
// view関数はresources/view/内にあるファイルを取得する関数
// view('ファイル名')もしくは view('フォルダ名.ファイル名')  .bladeの前のみでおっけい
    }
    public function create(){
    	// 投稿画面
    	return view('diaries.create');
    }

    // createページにあるstoreメソッドの定義
		public function store(Request $request){
			// 保存画面
			// dd('ほげ');

			// $postで受け取る代わりに、Request使う　五行目
			// dd($request);

			// INSERT INTO diaries (title, body)VALUES($_POST['title'],$_POST['body'])  →
			// INSERT INTO diaries (title, body)VALUES($request->title,$request->body)  →
			// モデルクラスDiaryを使用する
			$diary = new Diary();  //インスタンス化　オブジェクトにする
			$diary->title = $request->title;
			$diary->body = $request->body;
			$diary->save();

// 登録し終わったら一覧ページに戻る、リダイレクト処理
// この処理はstoreメソッドではない　　コードを太らせない！！
// createで見ようとすると、URLが変わってしまう
			return redirect()->route('diary.index');
// header()と同じような処理
		}


}

// view('diaries.index',["diaries" => $diaries]
// view('③',["②" => ①]①の変数を、②の変数に変えて③のviewへ送る。

// 端折らずに返したら、変数定義してarray関数で....とか書かないけんけど　上の書き方をララベルのルールとして覚える






















