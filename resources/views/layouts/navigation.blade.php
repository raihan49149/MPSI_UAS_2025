<nav class="bg-white border-b border-gray-100 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="text-lg font-bold text-indigo-600 dark:text-white">
                    SIM Renovasi
                </a>

                <!-- Navigation Links -->
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-700 dark:text-gray-300' }}">
                        Dashboard
                    </a>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'client')
                        <a href="{{ route('projects.index') }}" class="text-sm font-medium {{ request()->routeIs('projects.*') ? 'text-indigo-600' : 'text-gray-700 dark:text-gray-300' }}">
                            Proyek
                        </a>
                    @endif

                    @if(auth()->user()->role === 'contractor' || auth()->user()->role === 'admin')
                        <a href="{{ route('progress-reports.index') }}" class="text-sm font-medium {{ request()->routeIs('progress-reports.*') ? 'text-indigo-600' : 'text-gray-700 dark:text-gray-300' }}">
                            Laporan Progres
                        </a>
                    @endif
                @endauth
            </div>

            <!-- User Dropdown -->
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
