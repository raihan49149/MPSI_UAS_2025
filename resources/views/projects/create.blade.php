<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Tambah Proyek Renovasi</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-2xl mx-auto">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="title" value="Judul Proyek" />
                <x-text-input type="text" name="title" id="title" class="w-full" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="description" value="Deskripsi Proyek" />
                <textarea name="description" id="description" rows="4" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">
                Simpan
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
