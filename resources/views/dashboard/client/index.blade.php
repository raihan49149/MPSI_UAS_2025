<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Dashboard Klien</h2>
    </x-slot>

    <div class="py-6 px-4 space-y-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold">Selamat Datang, {{ Auth::user()->name }}!</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Silakan kelola dan pantau proyek renovasi Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('projects.index') }}" class="bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 p-4 rounded shadow">
                <h4 class="text-blue-800 dark:text-blue-300 font-semibold">📁 Lihat Proyek</h4>
                <p class="text-sm text-gray-600 dark:text-gray-300">Lihat semua proyek renovasi yang Anda ajukan.</p>
            </a>
        </div>
    </div>
</x-app-layout>
