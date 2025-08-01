<x-layouts.auth title="Login">
    <div class="w-full max-w-md space-y-6">
        <!-- Logo and Header -->
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <!-- Logo dengan ukuran yang lebih proporsional -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo Sekolah" class="h-32 w-auto object-contain">
                <!-- h-32 lebih seimbang untuk form login -->
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Masuk ke akun Anda</h2>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Alamat Email
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required autofocus
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="email@contoh.com">
                </div>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1   ">
                    Password
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            {{-- <div class="flex items-center">
                <input id="remember-me" name="remember" type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                    Ingat saya
                </label>
            </div> --}}

            <!-- Submit Button -->
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 mt-3">
                Masuk
            </button>

            <!-- Forgot Password Link -->
            {{-- <div class="text-center text-sm pt-2">
                <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Lupa password?
                </a>
            </div> --}}
        </form>
    </div>
</x-layouts.auth>