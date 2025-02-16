<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition {{ Auth::check() && Auth::user()->role == 'admin' ? 'sidebar-mini' : '' }}">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.navigation')

        <!-- Sidebar -->
        @if (Auth::check() && Auth::user()->role == 'admin')
            @include('layouts.sidebar')
        @endif


        <!-- Main Content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('layouts.footer')

    </div>

    <!-- AdminLTE Scripts -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let isAdmin = @json(Auth::check() && Auth::user()->is_admin);
            if (!isAdmin) {
                document.body.classList.add("sidebar-collapse");
            }
        });
    </script>
    


</body>

</html>
