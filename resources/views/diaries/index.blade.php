<!-- bladeファイル
viewのテンプレートエンジンと呼ばれるもので、phpとhtmlをもっと効率よく書く事ができる仕組み -->
<!-- laravel ではviewは必ずbladeで作る必要がある    .blade抜くと画面でない -->

@extends('layout')

@section('title')
Diary 一覧
@endsection

@section('content')

<!-- <!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">

</head> -->
<body>
	<div class="m-4 p-4 border border-primary">
		<p>ほげ</p>
		<p>ほげほげほげ</p>
		<p>2019/xx/yy</p>
	</div>

@endsection

{{-- </html> --}}


<!-- レイアウトphpあるから、ボディー以外残部消す -->