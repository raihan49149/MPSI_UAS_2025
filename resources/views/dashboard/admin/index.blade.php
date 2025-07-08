<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6 px-4 space-y-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold">Halo Admin, {{ Auth::user()->name }}</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Pantau dan kelola semua proyek dan laporan yang berjalan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('projects.index') }}" class="bg-indigo-100 hover:bg-indigo-200 dark:bg-indigo-900 p-4 rounded shadow">
                <h4 class="text-indigo-800 dark:text-indigo-300 font-semibold">📁 Semua Proyek</h4>
                <p class="text-sm">Kelola proyek yang diajukan oleh klien.</p>
            </a>
            <a href="{{ route('progress-reports.index') }}" class="bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900 p-4 rounded shadow">
                <h4 class="text-yellow-800 dark:text-yellow-300 font-semibold">📝 Verifikasi Laporan</h4>
                <p class="text-sm">Tinjau dan setujui laporan dari kontraktor.</p>
            </a>
        </div>
    </div>
</x-app-layout>
