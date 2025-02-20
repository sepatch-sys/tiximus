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
                <!-- Search Box di Kiri -->
                <div class="relative w-64">
                    <input type="text"
                        class="form-input px-4 py-2 rounded-full w-full bg-white text-gray-800 shadow-sm border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-300 ease-in-out"
                        placeholder="Search...">
                    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>

                <!-- Logo di Tengah -->
                <div class="absolute left-1/2 transform -translate-x-1/2">
                    <a href="/" class="block">
                        <img src="/images/logoTiximus.png" alt="Logo" class="h-10">
                    </a>
                </div>
            @endif
        @endauth

        @guest
            <div class="relative w-full">
                <input type="text"
                    class="form-input px-4 py-2 rounded-full w-full bg-white text-gray-800 shadow-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-300 ease-in-out"
                    placeholder="Search...">
                <i
                    class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 transition-all duration-300 ease-in-out"></i>
            </div>
        @endguest
    </ul>

    <ul class="navbar-nav ml-auto">
        @auth
            <li class="relative" x-data="{ open: false }">
                <!-- Tombol Dropdown (Gambar Profil atau Inisial) -->
                <a @click="open = !open" href="#" class="flex items-center">
                    @if (Auth::user()->profile_photo_url)
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile"
                            class="w-10 h-10 rounded-full border border-gray-300 shadow-sm object-cover">
                    @else
                        @php
                            $colors = [
                                'bg-red-500',
                                'bg-blue-500',
                                'bg-green-500',
                                'bg-yellow-500',
                                'bg-purple-500',
                                'bg-pink-500',
                            ];
                            $color = $colors[ord(strtoupper(substr(Auth::user()->name, 0, 1))) % count($colors)];
                        @endphp
                        <div
                            class="w-10 h-10 rounded-full {{ $color }} flex items-center justify-center text-white font-semibold text-lg border border-gray-300 shadow-md">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                </a>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200 transform opacity-0 scale-95"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150 transform opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden border z-50">

                    <div class="px-4 py-3 border-b text-center">
                        <span class="block text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user-edit mr-2"></i> Profile
                    </a>

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
