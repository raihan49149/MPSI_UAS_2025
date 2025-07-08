<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Daftar Proyek Renovasi</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto space-y-4">
        @if (session('success'))
            <div class="p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Semua Proyek</h3>
            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'client')
                <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Proyek
                </a>
            @endif
        </div>

        <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="border px-4 py-2 text-left">Judul</th>
                    <th class="border px-4 py-2 text-left">Deskripsi</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">Kontraktor</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                        <td class="border px-4 py-2 font-semibold">{{ $project->title }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($project->description, 50) }}</td>
                        <td class="border px-4 py-2 capitalize">
                            <span class="px-2 py-1 text-xs font-medium rounded
                                {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' :
                                   ($project->status === 'in progress' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700') }}">
                                {{ $project->status ?? 'pending' }}
                            </span>
                        </td>
                        <td class="border px-4 py-2">
                            {{ $project->contractor?->name ?? '-' }}
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            {{-- Optional delete form --}}
                            {{-- <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada proyek.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
