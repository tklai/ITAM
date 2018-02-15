<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#f8f9fa"/>
    <title>Error - IT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" role="navigation">
    <div class="container">
        <a class="navbar-brand d-none d-sm-block" href="/">IT Asset Management System</a>
        <a class="navbar-brand d-sm-none" href="#">ITAM System</a>
    </div>
</nav>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="d-flex align-items-center pt-3 pb-2">
                @yield('actionButtons')
                <h3 class="mb-0 order-6">Error</h3>
            </div>
            <div class="alert alert-danger">
                Whoops, looks like something went wrong. Please contact administrator.
            </div>
        </div>
    </div>
    <div id="javascript">
        <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @yield('javascript')
    </div>
</main>
</body>
</html>
