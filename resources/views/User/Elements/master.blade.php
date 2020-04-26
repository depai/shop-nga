<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Đăng ký thành lập doanh nghiệp</title>
    <script src="https://kit.fontawesome.com/4fca91e197.js" crossorigin="anonymous"></script>
    <link href="https://thanhlapcongtylegalbiz.site/theme/css/style.css" rel="stylesheet" media="screen">
    <link href="https://thanhlapcongtylegalbiz.site/theme/css/skins/default.css" rel="stylesheet" media="screen">
{{--    <link rel="stylesheet" href="{{ asset('/css/frontend/app.css') }}">--}}
</head>
<body>
    @include('User.Elements.header')
    @include('User.Elements.nav')
    @yield('content')
    @include('User.Elements.footer')
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/jquery.min.js"></script>
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/bootstrap.min.js"></script>
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/sticky.js"></script>
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/lazyload.min.js"></script>
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/owl.carousel.min.js"></script>
    <script src="https://thanhlapcongtylegalbiz.site/theme/js/scripts.js"></script>

	@yield('script')
</body>
</html>
