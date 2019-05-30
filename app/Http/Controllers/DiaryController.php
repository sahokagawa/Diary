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

use Illuminate\Support\Facades\Auth;
//Auth;クラスを使えるようにする


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
	// $diaries = Diary::all()->toArray();
	// いいね機能のために51行目でいじる

				//  Diaryクラス
				//急遽toArray()メソッドで配列にして見やすく！！
							// SELECT*FROM diaries WHERE  1を実行し$diariesを入れる(小文字複数形にしたテーブルができる)
							// allメソッドだけやと、見にくいかたら(Collectionで表示される)、toArray()メソッドで配列（Array)にチェインする
				// dd($diaries);     //確認

				// $diaries = Diary::find(1)->toArray();  こんなのもある！色々ある！

// いいね機能のためにいじる   39行目変更
	$diaries = Diary::with('likes')->orderBy('id','desc')->get();




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

			$diary->user_id = Auth::user()->id;
			// dd(Auth::user()->id);
			// Auth::user() で今ログインしてるユーザーのいろんな情報取れる

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

			// $user = User::find($id);
   //  $user->delete();
   //  return redirect('/');

		}

		public function edit($id){
			$diary= Diary::find($id);
			// SELECT * FROM diaries WHERE id=?
			// $diaryはcontrollerという型でできていて、Array にするにはtoArray()
			// 普通はやり方揃えた方がいいいけど、今回は勉強のため別パターンもやってみよう

			return view('diaries.edit',['diary' => $diary]);
		}

			function update($id,CreateDiary $request){
				//$requestがバリデーション機能付きの＄＿POSTみたいなもの

				// $diary= Diary::find($id);   //一件データ取得

				//  $diary= Diary::find($id);  // 値上書き
				// $diary->save();             //保存

				$diary= Diary::find($id);  //

				$diary->title = $request->title; //画面で入力されたタイトルを代入
		    $diary->body = $request->body; //画面で入力された本文を代入
		    $diary->save(); //DBに保存

		    return redirect()->route('diary.index'); //一覧ページにリダイレクト
		}



// マイページに飛ぶ
// 今回回欲しいのはログインしているユーザーが投稿した日記データが欲しい
//たとえばログインユーザー１だったら
// SELECT*FROM diaries WHERE user_id=1
			public function mypage(){


				// パターン１
				// $login_user = Auth::user();
				// // dd($login_user->id);

				// // 欲しいのは日記データのidではなくて、その人のユーザーID
				// // where('カラム名',値);
				// $diaries = Diary::where("user_id",1)->get();
				// dd($diaries);


				// パターン２　modelのリレーションを使うパターン
				$login_user = Auth::user();
				$diaries = $login_user->diaries;
				// dd($diaries);
				// $login_user->diaries()かっこつけると、hasmanyメソッドが取れちゃう
				// （）なしでプロパティ　データが取れる

				return view('diaries.mypage', ['diaries' => $diaries]);
			}


			function like($id){
				// idをもとにdiaryデータを一件取得
				$diary= Diary::where('id',$id)->with('likes')->first();
				// dd($diary);
				// withつけると、ddした時にdiaryテーブルに紐ずくlikesテーブルも持ってきてくれる　　今回なくてもプログラムに問題ない　　よくわからんけど笑
				// SQL文で書くとJOINっていうのを使わないといけない
				// SELECT FROM diaries JOIN likes..............

				//likesテーブルに選択されているdiaryとログインしているユーザーのidをINSERTする
				$diary->likes()->attach(Auth::user()->id);
				// attachっていうメソッド
				// i INSERT INTO likes (diary_id, user_id) VALUES ($diary->id, Auth::user()->id)			}

				return redirect()->route('diary.index');
		}

		function dislike($id){
			// dd($id);
				$diary= Diary::where('id',$id)->with('likes')->first();
				$diary->likes()->detach(Auth::user()->id);
				// DELETE FROM likes WHERE diary_id=$diary->id AND user_id=Auth::user()->id
				return redirect()->route('diary.index');
		}

// ユーザー一覧表示試みた
			// public function alluser(){
			// 	 $user = Users::all($request->input('id'));
			// 	return view('diaries.user', ['users' => $users]);
			// }


//アカウント削除試みた
		// 		public function destroy($id)
		// 		{
		// 		   $user = User::find($id);
		// 			 $user->delete();
		// 		   return redirect('/');
		// }

}

// view('diaries.index',["diaries" => $diaries]
// view('③',["②" => ①]①の変数を、②の変数に変えて③のviewへ送る。

// はしょらんで書いたら、変数定義してarray関数で....とか書かないけんけど上の書き方をララベルのルールとして覚える






















