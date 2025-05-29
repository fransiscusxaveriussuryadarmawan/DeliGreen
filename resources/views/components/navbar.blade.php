<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2c3e50;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-leaf me-2"></i>DeliGreen
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link py-2 px-3 rounded {{ request()->routeIs('admin.foods.*') ? 'active bg-white text-dark' : '' }}"
                        href="{{ route('admin.foods.index') }}">
                        <i class="fas fa-utensils me-1"></i> Food
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link py-2 px-3 rounded {{ request()->routeIs('admin.categories.*') ? 'active bg-white text-dark' : '' }}"
                        href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-tags me-1"></i> Categories
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link py-2 px-3 rounded {{ request()->routeIs('admin.customers.*') ? 'active bg-white text-dark' : '' }}"
                        href="{{ route('admin.customers.index') }}">
                        <i class="fas fa-users me-1"></i> Customers
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link py-2 px-3 rounded {{ request()->routeIs('admin.orders.*') ? 'active bg-white text-dark' : '' }}"
                        href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-shopping-cart me-1"></i> Orders
                    </a>
                </li>

                <li class="nav-item mx-1">
                    <a class="nav-link py-2 px-3 rounded {{ request()->routeIs('admin.reports.*') ? 'active bg-white text-dark' : '' }}"
                        href="{{ route('admin.reports.index') }}">
                        <i class="fas fa-chart-bar me-1"></i> Reports
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    @auth
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center text-white" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fs-4 me-1"></i>{{ Auth::user()->name }}
                        <span class="d-none d-lg-inline ms-1"></span>
                    </a>
                    @endauth
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@section('modals')
    @include('components.logout-modal')
@endsection