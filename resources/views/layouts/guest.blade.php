<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <style type="text/css">
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('contents')
    <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</div>
</body>
</html>
