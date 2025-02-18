<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #133E87;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        @auth
            @if (Auth::user()->role === 'admin')
                <!-- Navbar khusus Admin -->
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard.index') }}" class="nav-link text-white font-weight-regular">Dashboard</a>
                </li>
            @else
                <!-- Navbar khusus User -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home.index') }}" class="nav-link text-white font-weight-regular">Home</a>
                </li>
            @endif
        @endauth

        @guest
            <!-- Navbar untuk Guest (Belum Login) -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home.index') }}" class="nav-link text-white font-weight-regular">Home</a>
            </li>
        @endguest
    </ul>

    <ul class="navbar-nav ml-auto">
        @auth
            <!-- User Dropdown Menu (Hanya untuk user dan admin) -->
            <li class="relative" x-data="{ open: false }">
                <!-- Tombol Dropdown -->
                <a @click="open = !open" href="#" class="flex items-center text-white hover:text-gray-200 transition duration-200 ease-in-out">
                    <i class="far fa-user text-lg"></i>
                    <span class="ml-2 hidden md:inline">{{ Auth::user()->name }}</span>
                    <i class="fas fa-caret-down ml-2 text-sm"></i>
                </a>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200 transform opacity-0 scale-95"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150 transform opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden border z-50">

                    <div class="px-4 py-3 border-b">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 text-center hover:bg-gray-100">
                            Profile
                        </a>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link text-white font-weight-regular">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </li>
        @endguest
    </ul>
</nav>
