{{-- bladeファイル
viewのテンプレートエンジンと呼ばれるもので、phpとhtmlをもっと効率よく書く事ができる仕組み  --}}
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


{{-- 誰でも編集したり削除できたらで来たら困る @if @endifで設定--}}
{{-- @if(Auth::check()がtureの時読み込まれる  ログインしてた場合だけ読み込まれる  ＆＆　ユーザ＾がだけが編集できる--}}
		@if(Auth::check() && Auth::user()->id == $diary['user_id'])
      	{{-- 編集ボタン --}}
				<a class="btn btn-outline-success" href="{{ route('diary.edit', ['id' => $diary['id']]) }}"><i class="far fa-edit"></i></a>

				{{--削除ボタンを設ける--}}
				<form action="{{route('diary.destroy',['id' => $diary['id']])}}" method="POST" class="d-inline">

					@csrf
					@method('delete')
					<button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>削除</button>
				{{-- outlineって入れると、白抜き、カーソル合わせたら色変わるようになる --}}
				</form>
			@endif

			</div>
			@endforeach


	@endsection

{{-- </html> --}}


<!-- レイアウトphpあるから、ボディー以外残部消す