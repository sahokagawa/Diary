<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// require_onceのイケてる版

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

    	return view('diaries.index');
    	// view関数はresources/view/内にあるファイルを取得する関数
    	// view('ファイル名')もしくは view('フォルダ名.ファイル名')  .bladeの前のみでおっけい
    }
    public function create(){
    	return view('diaries.create');
    }

}
