<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Laporan Progres Proyek</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto space-y-4">
        @if(session('success'))
            <div class="p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($reports->isEmpty())
            <div class="text-gray-600 dark:text-gray-300">Belum ada laporan progres.</div>
        @else
            <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border px-4 py-2">Proyek</th>
                        <th class="border px-4 py-2">Catatan</th>
                        <th class="border px-4 py-2">Tanggal</th>
                        <th class="border px-4 py-2">Foto</th>
                        <th class="border px-4 py-2">Status</th>
                        @if(auth()->user()->role === 'admin')
                            <th class="border px-4 py-2">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                            <td class="border px-4 py-2">{{ $report->project->title }}</td>
                            <td class="border px-4 py-2">{{ $report->report_text }}</td>
                            <td class="border px-4 py-2">{{ $report->created_at->format('d M Y') }}</td>
                            <td class="border px-4 py-2">
                                @if($report->photo)
                                    <img src="{{ asset('storage/' . $report->photo) }}" class="h-16 rounded">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded
                                    {{ $report->status === 'approved' ? 'bg-green-100 text-green-700' :
                                       ($report->status === 'rejected' ? 'bg-red-100 text-red-700' :
                                       'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            @if(auth()->user()->role === 'admin')
                                <td class="border px-4 py-2 space-x-2">
                                    @if($report->status === 'pending')
                                        <form action="{{ route('progress-reports.approve', $report->id) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button class="text-green-600 hover:underline">Setujui</button>
                                        </form>
                                        <form action="{{ route('progress-reports.reject', $report->id) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button class="text-red-600 hover:underline ml-2">Tolak</button>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-400">Sudah diverifikasi</span>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
