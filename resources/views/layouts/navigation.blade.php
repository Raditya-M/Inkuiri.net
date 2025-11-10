<!-- Complete redesign with glassmorphism, improved spacing, modern icons, better mobile menu -->
<nav 
    x-data="{ open: false }" 
    class="fixed top-0 left-0 right-0 z-50 backdrop-blur-xl bg-slate-950/80 border-b border-white/10"
>
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between h-20 px-4 sm:px-6 lg:px-8">
            <!-- Left: Logo & Links -->
            <div class="flex items-center space-x-1 sm:space-x-2">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex-shrink-0 group transition-transform duration-200 hover:scale-105">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center">
                        <span class="text-slate-900 font-bold text-lg">📚</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:space-x-1 ml-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('event')" :active="request()->routeIs('event')"
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        Events
                    </x-nav-link>

                    <x-nav-link :href="route('pinjam')" :active="request()->routeIs('pinjam')"
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        Books
                    </x-nav-link>

                    @if(Auth::user()->role === 'user')
                    <x-nav-link :href="route('riwayat')" :active="request()->routeIs('riwayat')"
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        Purchase History
                    </x-nav-link>
                    @endif

                    @if(Auth::user()->role === 'admin')
                    <x-nav-link :href="route('admin.riwayat')" :active="request()->routeIs('admin.riwayat')"
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        User History
                    </x-nav-link>

                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')"
                        class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200">
                        Admin
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right: User Menu -->
            <div class="hidden md:flex md:items-center md:space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 px-4 py-2 bg-white/10 hover:bg-white/20 text-slate-100 rounded-lg transition-all duration-200 border border-white/20">
                            <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-slate-100 hover:bg-white/10">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-slate-100 hover:bg-white/10">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-slate-300 hover:text-white hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" :class="{'hidden': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="w-6 h-6" :class="{'hidden': !open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden bg-slate-900/95 backdrop-blur-sm border-t border-white/10">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-colors">
                    Dashboard
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('event')" :active="request()->routeIs('event')"
                    class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-colors">
                    Events
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pinjam')" :active="request()->routeIs('pinjam')"
                    class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-colors">
                    Books
                </x-responsive-nav-link>
            </div>

            <div class="border-t border-white/10 px-4 py-4">
                <div class="text-sm font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-xs text-slate-400">{{ Auth::user()->email }}</div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')"
                        class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-colors">
                        Profile
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition-colors">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
