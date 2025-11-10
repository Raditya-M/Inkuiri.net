<!-- Complete redesign with modern grid layout, glassmorphic cards, gradient backgrounds -->
<x-app-layout>
    <div class="pt-24 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="mb-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-2">Welcome back!</h1>
                <p class="text-slate-400 text-lg">Explore events, browse books, and manage your account</p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Hero Section -->
                <div class="lg:col-span-3">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-900/40 via-slate-900/40 to-cyan-900/40 border border-white/10 backdrop-blur-xl p-8 sm:p-12">
                        <div class="relative z-10">
                            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">The more that you read,<br>the more things you will know.</h2>
                            <p class="text-slate-300 text-lg mb-6 max-w-xl">"Success is walking from failure to failure with no loss of enthusiasm." – J.K. Rowling</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('pinjam') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-cyan-500/30">
                                    Explore Books
                                </a>
                                <a href="{{ route('event') }}" class="inline-flex items-center px-6 py-3 border border-white/20 hover:border-white/40 text-white font-semibold rounded-xl transition-all duration-200 bg-white/5 hover:bg-white/10 backdrop-blur">
                                    View Events
                                </a>
                            </div>
                        </div>
                        <!-- Background decoration -->
                        <div class="absolute inset-0 overflow-hidden">
                            <div class="absolute -top-20 -right-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
                        </div>
                    </div>
                </div>

                
                <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Books Card -->
                    <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-slate-300 font-semibold">Total Books</h3>
                                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                    <span class="text-blue-400 text-lg">📚</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-white">1,234</p>
                            <p class="text-slate-400 text-sm mt-2">Available for purchase</p>
                        </div>
                    </div>

                    <!-- Events Card -->
                    <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-slate-300 font-semibold">Upcoming Events</h3>
                                <div class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center">
                                    <span class="text-cyan-400 text-lg">🎉</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-white">12</p>
                            <p class="text-slate-400 text-sm mt-2">This month</p>
                        </div>
                    </div>

                    <!-- Users Card (Admin Only) -->
                    @if(Auth::user()->role === 'admin')
                    <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-slate-300 font-semibold">Active Users</h3>
                                <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                                    <span class="text-purple-400 text-lg">👥</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-white">456</p>
                            <p class="text-slate-400 text-sm mt-2">Registered accounts</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Features Grid -->
                <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Quick Actions -->
                    <div class="rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-xl overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-white mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('pinjam') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors duration-200 text-center font-semibold">
                                    Browse Books
                                </a>
                                <a href="{{ route('event') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors duration-200 text-center font-semibold">
                                    View Events
                                </a>
                                @if(Auth::user()->role === 'user')
                                <a href="{{ route('riwayat') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors duration-200 text-center font-semibold">
                                    My Purchases
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 backdrop-blur-xl overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-white mb-4">About Us</h3>
                            <p class="text-slate-300 leading-relaxed text-sm">Empowering readers through knowledge sharing. Join our community to explore curated book collections and engaging literary events.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
