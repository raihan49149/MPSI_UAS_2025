<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Dashboard Kontraktor</h2>
    </x-slot>

    <div class="py-6 px-4 space-y-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold">Halo, {{ Auth::user()->name }}!</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Lihat dan laporkan progres proyek yang Anda kerjakan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('progress-reports.index') }}" class="bg-green-100 hover:bg-green-200 dark:bg-green-900 p-4 rounded shadow">
                <h4 class="text-green-800 dark:text-green-300 font-semibold">📝 Laporan Progres</h4>
                <p class="text-sm text-gray-600 dark:text-gray-300">Kirim laporan dan dokumentasi proyek yang ditugaskan.</p>
            </a>
        </div>
    </div>
</x-app-layout>
