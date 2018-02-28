<!-- Responsive Navbar -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" role="navigation">
    <a class="navbar-brand d-none d-sm-block" href="/">IT Asset Management System</a>
    <a class="navbar-brand d-sm-none" href="#">ITAM System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar contents -->
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <a class="nav-item nav-link" href="{{ route('dashbaord') }}">Dashboard</a>
            <a class="nav-item nav-link" href="{{ route('assets.index') }}">Assets</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">Other Managements<span
                        class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="otherManagementDropdown">
                    <a class="dropdown-item" href="{{ route('departments.index') }}">Departments</a>
                    <a class="dropdown-item" href="{{ route('locations.index') }}">Locations</a>
                    <a class="dropdown-item" href="{{ route('models.index') }}">Models</a>
                    {{--<a class="dropdown-item" href="{{ route('orders.index') }}">Orders</a>--}}
                    <a class="dropdown-item" href="{{ route('vendors.index') }}">Vendors</a>
                </div>
            </li>
        </ul>
        <ul class="d-md-none dropdown-divider"></ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <a class="nav-item nav-link">User: {{ (Auth::check()) ? Auth::user()->name : 'Direct Access' }}</a>
            <a class="nav-item nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
</nav>
