<header class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-100">
    <div class="flex items-center justify-between px-8 py-4">
        <!-- Page Title -->
        <div>
            <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
            <p class="text-sm text-gray-500 mt-0.5">@yield('page-subtitle', 'Selamat datang kembali!')</p>
        </div>
        
        <!-- User Profile Section -->
        <div class="flex items-center gap-4">
            
            
            <!-- Profile Dropdown -->
            <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                <div class="text-right">
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Administrator' }}</p>
                        <p class="text-xs text-gray-500">Admin</p>
                        @elseif(auth()->check() && auth()->user()->role === 'guru')
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Pak Budi' }}</p>
                        <p class="text-xs text-gray-500">Guru</p>
                    @endif
                </div>
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=004680&color=fff&size=128" alt="Profile" class="w-10 h-10 rounded-full border-2 border-blue-100">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
            </div>
        </div>
    </div>
</header>