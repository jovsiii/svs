<nav class="w-56 md:w-64 bg-white/90 dark:bg-slate-950/90 border-r border-gray-200/60 dark:border-slate-800/60 flex flex-col backdrop-blur-md shadow-sm">
    <!-- Logo / Brand -->
    <div class="h-20 flex items-center px-6 bg-gradient-to-r from-indigo-50/50 to-blue-50/50 dark:from-indigo-950/20 dark:to-blue-950/20">
        <a href="{{ route('dashboard') }}" class="flex items-center group">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-600 dark:bg-indigo-500 rounded-lg shadow-sm group-hover:shadow-md transition-all duration-200">
                    <x-application-logo class="block h-8 w-auto text-white text-xl font-bold" />
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold text-gray-900 dark:text-white">SVS</span>
                </div>
            </div>
        </a>
    </div>

    <!-- User Profile Section -->
    <div class="px-6 py-4 border-b border-gray-200/60 dark:border-slate-800/60">
        <div class="flex items-center">
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>

    <!-- Main Nav Links -->
    <div class="flex-1 overflow-y-auto py-6">
        <div class="px-5 space-y-2">
            @php
                $linkBase = 'flex items-center px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group';
            @endphp

            <!-- Navigation Group Title -->
            <div class="px-4 py-2">
                <h3 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Main Menu</h3>
            </div>

            <a
                href="{{ route('dashboard') }}"
                class="{{ $linkBase }} {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-600/20 dark:text-indigo-300 shadow-sm' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-slate-800/50 hover:translate-x-1' }}"
            >
                <span class="mr-3 text-lg group-hover:scale-110 transition-transform duration-200">🏠</span>
                <span class="flex-1">{{ __('Dashboard') }}</span>
                @if(request()->routeIs('dashboard'))
                    <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                @endif
            </a>

            <a
                href="{{ route('incidents.create') }}"
                class="{{ $linkBase }} {{ request()->routeIs('incidents.create') ? 'bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-600/20 dark:text-indigo-300 shadow-sm' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-slate-800/50 hover:translate-x-1' }}"
            >
                <span class="mr-3 text-lg group-hover:scale-110 transition-transform duration-200">📝</span>
                <span class="flex-1">{{ __('Report Incident') }}</span>
                @if(request()->routeIs('incidents.create'))
                    <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                @endif
            </a>

            @if(auth()->user()->role === 'admin')
            <a
                href="{{ route('incidents.index') }}"
                class="{{ $linkBase }} {{ request()->routeIs('incidents.index') ? 'bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-600/20 dark:text-indigo-300 shadow-sm' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-slate-800/50 hover:translate-x-1' }}"
            >
                <span class="mr-3 text-lg group-hover:scale-110 transition-transform duration-200">📋</span>
                <span class="flex-1">{{ __('Incidents') }}</span>
                @if(request()->routeIs('incidents.index'))
                    <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                @endif
            </a>
            @endif

            <!-- Divider -->
            <div class="pt-6 mt-6 border-t border-gray-200/60 dark:border-slate-800/60">
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Account</h3>
                </div>
            </div>

            <!-- Profile Link -->
            <a
                href="{{ route('profile.edit') }}"
                class="{{ $linkBase }} {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-600/20 dark:text-indigo-300 shadow-sm' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-slate-800/50 hover:translate-x-1' }}"
            >
                <span class="mr-3 text-lg group-hover:scale-110 transition-transform duration-200">👤</span>
                <span class="flex-1">{{ __('Profile') }}</span>
                @if(request()->routeIs('profile.*'))
                    <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                @endif
            </a>

            <!-- Logout -->
            <div class="pt-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="{{ $linkBase }} w-full text-left text-gray-700 hover:bg-red-50 hover:text-red-600 dark:text-gray-300 dark:hover:bg-red-500/10 dark:hover:text-red-400 hover:translate-x-1 group"
                    >
                        <span class="mr-3 text-lg group-hover:scale-110 transition-transform duration-200">🚪</span>
                        <span class="flex-1">{{ __('Logout') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-200/60 dark:border-slate-800/60">
        <div class="text-center">
            <p class="text-xs text-gray-400 dark:text-gray-500">Version 1.0.0</p>
            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">© 2024 SVS System</p>
        </div>
    </div>
</nav>
