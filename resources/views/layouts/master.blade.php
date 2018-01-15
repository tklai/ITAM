<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
    @yield('additionalHeaders')
</head>
<body>
<div class="container">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Responsive Navbar -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-list">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">IT Asset Management System</a>
        </div>
        <div class="collapse navbar-collapse" id="collapse-list">
            <!-- Navbar contents -->
            <ul class="nav navbar-nav">
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/asset">Assets</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" role="button">Other Managements<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/department">Departments</a></li>
                        <li><a href="/admin/location">Locations</a></li>
                        <li><a href="/admin/model">Models</a></li>
                        <li><a href="/admin/order">Orders</a></li>
                        <li><a href="/admin/vendor">Vendors</a></li>
                        <!--<li class="divider"></li>-->
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" role="button">Logs<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/audit">Audit Log</a></li>
                        <!--<li class="divider"></li>-->
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="divider"></li>
                <!-- Authentication Links -->
                <li><a>User: {{ (Auth::check()) ? Auth::user()->name : 'Direct Access' }}</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @yield('contents')
</div>
</body>
</html>
