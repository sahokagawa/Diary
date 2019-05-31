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




{{-- 画像を出す --}}
{{-- フレームワークしてるからパスがめっちゃ長い --}}
{{-- publicフォルダが最初に読まれるから/から初めていい！ --}}
<img src="/img/ahiru.jpg">
{{-- もしくはasset関数使う --}}
<img src="{{asset('img/ahiru.jpg')}}">
{{-- DBに画像は登録できないからimgフォルダに蓄えて、DBには名前を蓄える --}}

{{-- コマンドphp artisan make:migration add_img_url_to_diaries_table --}}
{{-- upとdownをかく --}}
{{-- コマンド　php artisan migrate --}}

{{-- viewの作成 --}}
{{-- 画像の送信は必ずenctype=”multipart/form-data”属性 --}}
{{-- divタグの追加 --}}

{{-- storeメソッド --}}
{{-- storeAsメソッド　画像をアップロードするメソッド --}}
{{-- storeAs('public/diary_img','ahiru.jpg');場所と名前決めてる　　　あなじ名前ができる --}}
{{-- store('public/diary_img')に変更して保存する場所だけき決める --}}
{{-- 新規投稿すると　strage app public diary_imgの中に羽織っていく　ランダムな名前で！ --}}
{{-- コマンドphp artisan storage:link シンボリックつくる　パブリックの中をストレージの中に.....--}}
{{-- 投稿に表示されるようにこのファイルいじる --}}




<a href="{{route('diary.create')}}" class="btn btn-primary">新規投稿</a>

			@foreach ($diaries as $diary)
			<div class="m-4 p-4 border border-primary">
				<p>{{ $diary["title"] }}</p>
				<p>{{ $diary["body"] }}</p>
				@if($diary->img_url)
				<img src="{{str_replace('public/','storage/',$diary->img_url)}}">
				@endif
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

			{{-- いいね機能 --}}

			{{-- <div class="mt-3 ml-3"> --}}
				{{-- ボタンを全部横並びにしたいからdiv消してstyle="display:inline"追加 --}}


{{-- いいねされてたらいいねを取り消すボタンを --}}
	@if(Auth::check()&&$diary->likes->contains(function($user){
			return $user->id == Auth::user()->id;
		}))
		{{-- Auth::check()でまずログインしてるかどうか --}}
		{{-- contains(function($user){
			return $user->id == Auth::user()->id;ですでにいいねしたところにはいいねボタンなくなる --}}
			{{-- $diary->likesで取れるのはこの日記に何人いいねしているか --}}


{{-- いいねされてなければいいねボタンを設置 --}}
					<form style="display:inline" method="POST" action="{{ route('diary.dislike',['id' => $diary['id']]) }}">
						@csrf
					<button type="submit" class="btn btn-outline-danger"><i class="fas fa-thumbs-up"></i>
						{{-- <span>100</span> --}}
						<span>{{$diary->likes->count()}}</span>
					</button>
					</form>

		@else

				<form style="display:inline" method="POST" action="{{ route('diary.like',['id' => $diary['id']]) }}">
					@csrf
				<button type="submit" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i>
					{{-- <span>100</span> --}}
					<span>{{$diary->likes->count()}}</span>
				</button>
				</form>
			{{-- </div> --}}

		@endif
	</div>



			@endforeach


	@endsection

{{-- </html> --}}


<!-- レイアウトphpあるから、ボディー以外残部消す