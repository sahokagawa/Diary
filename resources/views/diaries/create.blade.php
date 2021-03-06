
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">

</head> -->

@extends('layout')

@section('title')
Diary 新規作成
@endsection

@section('content')

{{-- <body> --}}
	 <section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $message)
                         <li class="alert alert-danger">{{ $message }}</li>
                         @endforeach
                    </ul>
                    @endif

                <form action="{{ route('diary.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
               {{-- @csrf ララベルでフォームを実装する時に絶対必要 --}}
               {{-- これないとエラーが出る --}}
               {{-- オレオレ詐偽のパソコンverみたいな感じのに対策 --}}
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" />

                    {{-- ララベルに最初からあるold関数で入力内容保持 --}}
                    </div>
                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea class="form-control" name="body" id="body">{{old('body')}}</textarea>
                    </div>
                     <div class="form-group">
                        <label for="img_url">画像</label>
                       <input type="file" name="img_url" class="form-control" id="img_url">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">投稿</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
{{-- </body> --}}

@endsection

{{-- </html> --}}

<!-- 共通レイアウト部分を蓄えて、bodyの中身だけを読み出すことできる -->
<!-- 画面で見れるようにルートの中のweb.phpへ -->
<!-- その後DiaryController.phpにパブリック関数 -->
<!-- ローカルホスト8000に後に、ルートで最初に決めたdiary/create入れたら作成画面って出てくる -->