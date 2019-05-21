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
{{-- <body>
 --}}

<a href="{{route('diary.create')}}" class="btn btn-primary">新規投稿</a>

			@foreach ($diaries as $diary)
			<div class="m-4 p-4 border border-primary">
				<p>{{ $diary["title"] }}</p>
				<p>{{ $diary["body"] }}</p>
				<p>{{ $diary["created_at"] }}</p>
			</div>
			@endforeach


	@endsection

{{-- </html> --}}


<!-- レイアウトphpあるから、ボディー以外残部消す -->