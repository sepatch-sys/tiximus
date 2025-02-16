<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Gradient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-300 to-blue-900 animate-gradient">
    <div class="relative w-[900px] h-[550px] bg-white rounded-2xl shadow-lg overflow-hidden flex">
        <div class="flex w-full" id="formContainer">
            {{ $slot }}
        </div>
    </div>

    <style>
        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
                background-color: #93c5fd;
                /* blue-300 */
            }

            50% {
                background-position: 100% 50%;
                background-color: #1e3a8a;
                /* blue-900 */
            }

            100% {
                background-position: 0% 50%;
                background-color: #93c5fd;
                /* blue-300 */
            }
        }

        .animate-gradient {
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
        }
    </style>
</body>

</html>
