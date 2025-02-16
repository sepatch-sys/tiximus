<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links (Hanya untuk user yang login) -->
    @auth
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard.index') }}" class="nav-link text-dark font-weight-regular">Dashboard</a>
            </li>
        </ul>
    @endauth

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-dark font-weight-regular" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    <i class="fas fa-caret-down ml-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow">
                    <span class="dropdown-header text-dark font-weight-bold">
                        <i class="fas fa-user-circle mr-2"></i> {{ Auth::user()->name }}
                    </span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link text-dark font-weight-regular">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </li>
        @endguest
    </ul>
</nav>
    