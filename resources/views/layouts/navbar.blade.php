<!-- Responsive Navbar -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" role="navigation">
    <div class="container">
        <a class="navbar-brand d-none d-sm-block" href="/">IT Asset Management System</a>
        <a class="navbar-brand d-sm-none" href="#">ITAM System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar contents -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/asset">Assets</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">Other Managements<span
                                class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="otherManagementDropdown">
                        <a class="dropdown-item" href="/admin/department">Departments</a>
                        <a class="dropdown-item" href="/admin/location">Locations</a>
                        <a class="dropdown-item" href="/admin/model">Models</a>
                        <a class="dropdown-item" href="/admin/order">Orders</a>
                        <a class="dropdown-item" href="/admin/vendor">Vendors</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">Logs<span
                                class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="logDropdown">
                        <a class="dropdown-item" href="/admin/audit">Audit Log</a>
                    </div>
                </li>
            </ul>
            <ul class="d-md-none dropdown-divider"></ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <span class="nav-link">User: {{ (Auth::check()) ? Auth::user()->name : 'Direct Access' }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
