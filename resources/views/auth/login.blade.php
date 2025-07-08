<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg px-8 py-6">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Login ke SIM Renovasi</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Masukkan email dan password Anda</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full justify-center">
                        Login
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
