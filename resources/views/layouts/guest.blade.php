<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IT Asset Management System</title>
    <style type="text/css">
        html, body {
            height: 100%;
        }
        body {
            display:flex;
            align-items:center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
</head>
<body>
<div class="container">
    {{--Reserved for registration and password rese--}}
    {{--@if(Request::path() !== 'login')--}}
        {{--<nav role="navigation" class="navbar navbar-default navbar-fixed-top">--}}
            {{--<!-- Responsive Navbar -->--}}
            {{--<div class="navbar-header">--}}
                {{--<a class="navbar-brand" href="/">IT Assets Management System</a>--}}
            {{--</div>--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<!-- Authentication Links -->--}}
                {{--<li>--}}
                {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
    {{--@endif--}}
    @yield('contents')
</div>
</body>
</html>
