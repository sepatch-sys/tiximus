<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-indigo-600">
        <div class="relative w-[900px] h-[550px] bg-white rounded-2xl shadow-lg overflow-hidden flex">
            <div class="relative flex w-[1800px] transition-transform duration-500 ease-in-out h-full" id="formContainer">

                <!-- Bagian Sign In -->
                <div class="w-[900px] flex-shrink-0 flex h-full">
                    <div class="w-1/2 bg-blue-500 flex items-center justify-center text-white text-2xl font-bold h-full">
                        <div class="text-center">
                            <img src="LOGO.png" alt="Logo" class="mx-auto mb-4 w-28">
                            <button onclick="slideForm()" class="bg-white text-blue-600 px-8 py-2 rounded-full text-lg font-semibold">
                                Sign Up
                            </button>
                        </div>
                    </div>
                    <div class="w-1/2 p-10 flex flex-col justify-start pt-10 bg-[#d5e4f7] h-full">
                        <h2 class="text-3xl font-bold text-center">Sign In</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mt-6">
                                <label for="email" class="block text-sm font-medium">Email :</label>
                                <input id="email" type="email" name="email" required placeholder="Enter your email" class="mt-1 w-full px-4 py-2 border rounded-full">
                            </div>
                            <div class="mt-4 relative">
                                <label for="password" class="block text-sm font-medium">Password :</label>
                                <input id="password" type="password" name="password" required placeholder="Enter your password"
                                    class="mt-1 w-full px-4 py-2 border rounded-full pr-10">
                                <button type="button" onclick="togglePassword('password', 'eyeIcon')"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded-full">Sign In</button>
                        </form>
                    </div>
                </div>

                <!-- Bagian Sign Up -->
                <div class="w-[900px] flex-shrink-0 flex h-full absolute left-0 translate-x-full transition-transform duration-500 ease-in-out"
                    id="signupForm">
                    <div class="w-1/2 bg-blue-500 flex items-center justify-center text-white text-2xl font-bold h-full">
                        <div class="text-center">
                            <img src="LOGO.png" alt="Logo" class="mx-auto mb-4 w-28">
                            <button onclick="slideForm()" class="bg-white text-blue-600 px-8 py-2 rounded-full text-lg font-semibold">
                                Sign In
                            </button>
                        </div>
                    </div>
                    <div class="w-1/2 p-10 flex flex-col justify-start pt-10 bg-[#d5e4f7] h-full">
                        <h2 class="text-3xl font-bold text-center">Sign Up</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mt-6">
                                <label for="name" class="block text-sm font-medium">Name :</label>
                                <input id="name" type="text" name="name" required placeholder="Enter your name" class="mt-1 w-full px-4 py-2 border rounded-full">
                            </div>
                            <div class="mt-4">
                                <label for="email-signup" class="block text-sm font-medium">Email :</label>
                                <input id="email-signup" type="email" name="email" required placeholder="Enter your email" class="mt-1 w-full px-4 py-2 border rounded-full">
                            </div>
                            <div class="mt-4 relative">
                                <label for="password-signup" class="block text-sm font-medium">Password :</label>
                                <input id="password-signup" type="password" name="password" required placeholder="Enter your password"
                                    class="mt-1 w-full px-4 py-2 border rounded-full pr-10">
                                <button type="button" onclick="togglePassword('password-signup', 'eyeIconSignUp')"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                    <svg id="eyeIconSignUp" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-4 relative">
                                <label for="password-confirm" class="block text-sm font-medium">Confirm Password :</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required placeholder="Confirm your password"
                                    class="mt-1 w-full px-4 py-2 border rounded-full pr-10">
                                <button type="button" onclick="togglePassword('password-confirm', 'eyeIconConfirm')"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                    <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded-full">Sign Up</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function slideForm() {
            const signupForm = document.getElementById('signupForm');
            signupForm.classList.toggle('translate-x-full');
        }

        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML =
                    '<path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a20.29 20.29 0 0 1 3.95-5.57M22.08 14.12A10.93 10.93 0 0 0 21 12s-4 8-11 8-11-8-11-8 4-8 11-8a10.93 10.93 0 0 1 6.12 2.08"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML =
                    '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
            }
        }
    </script>
</x-guest-layout>
