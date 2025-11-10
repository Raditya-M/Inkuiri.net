<x-app-layout>
    <!-- Enhanced hero section with glassmorphic design and improved typography -->
    <div class="relative min-h-screen overflow-hidden">
        

        <!-- Hero content -->
        <div class="relative z-10 px-6 pt-20 pb-32 sm:pt-32 sm:pb-48 lg:px-8 lg:pt-40">
            <div class="mx-auto max-w-4xl">
                <!-- Subtitle badge -->
                <div class="flex justify-center mb-8">
                    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-full px-4 py-2 text-sm text-cyan-300 font-medium">
                        ✨ Jelajahi Acara Menarik
                    </div>
                </div>

                <!-- Main heading -->
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-center text-white mb-6 tracking-tight">
                    <span class="bg-gradient-to-r from-blue-400 via-cyan-300 to-violet-400 bg-clip-text text-transparent">
                        Event Inkuiri
                    </span>
                </h1>

                <!-- Subtitle text -->
                <p class="text-center text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed">
                    Temukan dan ikuti acara-acara eksklusif terbaru yang akan membawa Anda ke pengalaman yang tak terlupakan
                </p>
            </div>
        </div>
    </div>

    <!-- Events section with improved grid layout and card design -->
    <div class="relative py-20 lg:py-32">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-50"></div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-8">
            <!-- Section header -->
            <div class="text-center mb-16 sm:mb-20">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4 tracking-tight">
                    Acara Terbaru
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full mx-auto"></div>
            </div>

            <!-- Events grid -->
            @forelse($events as $event)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Event cards with glassmorphic design, improved shadows, and hover effects -->
                    <div class="group relative">
                        <!-- Card background glow on hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-violet-600 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-500 blur-xl"></div>

                        <!-- Card container -->
                        <div class="relative backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:border-white/20 h-full flex flex-col">
                            <!-- Image container -->
                            @if($event->gambar)
                                <div class="relative h-48 sm:h-56 overflow-hidden bg-gradient-to-br from-slate-800 to-slate-900">
                                    <img src="{{ asset('storage/' . $event->gambar) }}" 
                                         alt="{{ $event->judul }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <!-- Image overlay gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                                </div>
                            @else
                                <div class="h-48 sm:h-56 bg-gradient-to-br from-blue-900/40 to-violet-900/40 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif

                            <!-- Card content -->
                            <div class="flex-1 p-6 sm:p-7 flex flex-col justify-between">
                                <!-- Title and description -->
                                <div>
                                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 group-hover:text-cyan-300 transition-colors duration-300 line-clamp-2">
                                        {{ $event->judul }}
                                    </h3>
                                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed mb-4 line-clamp-3">
                                        {{ Str::limit($event->deskripsi, 120) }}
                                    </p>
                                </div>

                                <!-- Date and action -->
                                <div class="flex items-center justify-between pt-4 border-t border-white/10">
                                    <div class="flex items-center gap-2 text-sm text-cyan-400 font-medium">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6 2a1 1 0 000 2h8a1 1 0 100-2H6zM4 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"/>
                                        </svg>
                                        <span class="text-xs sm:text-sm">{{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d M Y') }}</span>
                                    </div>
                                    <button class="p-2 rounded-lg bg-blue-500/20 hover:bg-blue-500/40 text-blue-300 transition-all duration-300 hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Improved empty state with better messaging and styling -->
                <div class="min-h-96 flex items-center justify-center">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-800/50 rounded-full mb-4">
                            <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <p class="text-slate-400 text-lg font-medium mb-2">Belum Ada Event</p>
                        <p class="text-slate-500 text-sm max-w-xs mx-auto">
                            Tidak ada acara yang tersedia saat ini. Silakan kembali lagi nanti untuk melihat acara-acara menarik.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Added CSS animations for background orbs -->
    <style>
        @keyframes blob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        @supports (animation-timeline: view()) {
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        }
    </style>
</x-app-layout>
