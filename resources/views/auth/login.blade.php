<x-guest-layout>
    <div
        class="relative w-[900px] h-[550px] bg-gradient-to-br from-blue-300 to-indigo-300 rounded-2xl shadow-2xl overflow-hidden flex">

        <!-- Container Sign In & Sign Up -->
        <div class="relative flex w-full h-full">
            <!-- Sign In -->
            <div
                class="w-1/2 p-10 flex flex-col justify-center bg-white h-full transition-all duration-500 ease-in-out rounded-l-2xl">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Sign In</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input id="email" type="email" name="email" required placeholder="Enter your email"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input id="password" type="password" name="password" required placeholder="Enter your password"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-blue-300">
                    </div>
                    <button type="submit"
                        class="mt-6 w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:scale-105">
                        Sign In
                    </button>
                </form>
                <div class="mt-4 w-full flex flex-col items-center">
                    <p class="text-gray-600">Or sign in with:</p>
                    <a href="{{ route('google.redirect') }}"
                        class="mt-2 flex items-center justify-center bg-white text-gray-800 border border-gray-300 py-2 px-4 rounded-full transition-all duration-300 w-3/4 max-w-xs shadow-md hover:shadow-lg hover:scale-105">
                        <img src="https://developers.google.com/identity/images/g-logo.png" class="w-6 h-6 mr-2"> Sign
                        in with Google
                    </a>
                </div>
            </div>

            <!-- Sign Up -->
            <div
                class="w-1/2 p-10 flex flex-col justify-center bg-white h-full transition-all duration-500 ease-in-out rounded-r-2xl">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Sign Up</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input id="name" type="text" name="name" required placeholder="Enter your name"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-indigo-300">
                    </div>
                    <div class="mt-4">
                        <label for="email-signup" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input id="email-signup" type="email" name="email" required placeholder="Enter your email"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-indigo-300">
                    </div>
                    <div class="mt-4">
                        <label for="password-signup" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input id="password-signup" type="password" name="password" required
                            placeholder="Enter your password"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-indigo-300">
                    </div>
                    <div class="mt-4">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm
                            Password:</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            placeholder="Confirm your password"
                            class="mt-1 w-full px-4 py-2 border rounded-xl focus:ring focus:ring-indigo-300">
                    </div>
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-500 hover:bg-indigo-600 text-white py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:scale-105">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>

        <!-- Kotak Penutup dengan Animasi Geser -->
        <div id="toggleCover"
            class="absolute left-0 top-0 w-1/2 h-full bg-[#608BC1] rounded-2xl shadow-lg flex flex-col items-center justify-center transition-all duration-500 ease-in-out">
            <h2 id="toggleTitle" class="text-3xl font-bold mb-4 text-white">Hello Again</h2>
            <p class="text-center text-lg mb-6 text-white">Click the button below to switch forms</p>
            <button onclick="toggleForm()" id="toggleButton"
                class="bg-white hover:bg-gray-200 text-[#608BC1] px-8 py-3 rounded-full text-lg font-semibold transition-all duration-300 shadow-md hover:scale-110">
                Sign In
            </button>
        </div>

    </div>

    <script>
        let isSignUp = false;

        function toggleForm() {
            const cover = document.getElementById('toggleCover');
            const button = document.getElementById('toggleButton');
            const title = document.getElementById('toggleTitle');

            isSignUp = !isSignUp;
            if (isSignUp) {
                cover.classList.add('translate-x-full');
                title.innerText = "Welcome";
                button.innerText = "Sign Up";
            } else {
                cover.classList.remove('translate-x-full');
                title.innerText = "Hello Again";
                button.innerText = "Sign In";
            }

        }
    </script>
</x-guest-layout>
