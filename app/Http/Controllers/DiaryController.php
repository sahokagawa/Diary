<?php

namespace App\Http\Controllers;
//namespace 各クラスのショートカットつくるようなイメージ
// ショートカットの名前使ってuseで呼び出す感じ
// 注意するのは、最初大文字と、バックスラッシュ



// require_onceのイケてる版
use Illuminate\Http\Request;
//長すぎて書きたくもない笑
use App\Diary;
// require_once('../../Diary.php');
use App\Http\Requests\CreateDiary;
// require_once('../Requests/CreateDiary.php');


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
		public function store(CreateDiary $request){
			// Request クラスを使って$request   9行目で使えるようにする
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

		public function destroy($id){
			// dd($id);  //ddで画面に出す　確認
			// http://localhost:8000/diary/1/delete  数字のところ注目
			// 削除したところのIdになる
			// 引数($id)って入れることで画面上も数字になる　web.phpの引数
			// web.phpの引数が渡されて　 destroy関数で表示される

			// 削除処理
			// DELETE FROM ターブル名　WHERE id=?
			// ララベルではどう書くか
			$diary = Diary::find($id);
			// SELECT FROM diaries WHERE id=? が行われる
			$diary->delete();
			//  DELETE FROM diaries　WHERE id=?
			return redirect()->route('diary.index');

		}


}

// view('diaries.index',["diaries" => $diaries]
// view('③',["②" => ①]①の変数を、②の変数に変えて③のviewへ送る。

// はしょらんで書いたら、変数定義してarray関数で....とか書かないけんけど　上の書き方をララベルのルールとして覚える






















