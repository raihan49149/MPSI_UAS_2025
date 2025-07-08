<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg px-8 py-6">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Akun SIM Renovasi</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Silakan isi data di bawah ini untuk mendaftar</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" value="Nama Lengkap" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <x-input-label for="role" value="Daftar Sebagai" />
                    <select id="role" name="role" required class="w-full mt-1 rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-500">
                        <option value="">-- Pilih Peran --</option>
                        <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>Klien</option>
                        <option value="contractor" {{ old('role') === 'contractor' ? 'selected' : '' }}>Kontraktor</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-between">
                    <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>
                    <x-primary-button>
                        Daftar
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
