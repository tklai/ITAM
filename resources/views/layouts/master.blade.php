<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#f8f9fa"/>
    <title>@yield('title') - IT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
    @yield('additionalHeaders')
</head>
<body>
@include('layouts.navbar')
<main role="main" class="container pt-3">
    @yield('contents')
</main>
</body>
</html>
