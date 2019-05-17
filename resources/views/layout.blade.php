<!-- 例えばヘッダーなど、どのページにも共通のところ まとめる-->
{{-- 保存はdiaries直下にすること！diariesの中に入れたりするとエラー出るよ--}}

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">

</head>
<body>

	@yield('content')

</body>
</html>
