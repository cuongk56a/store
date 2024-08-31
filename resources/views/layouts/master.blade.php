<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('eshopper/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('eshopper/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('eshopper/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('eshopper/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')
    <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @yield('js')
</body>
</html>
