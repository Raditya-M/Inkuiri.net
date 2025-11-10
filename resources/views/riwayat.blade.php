<x-app-layout>
<section class="min-h-screen text-white py-12">
  <!-- Applied glassmorphism background with gradient and animated orbs -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 left-1/3 w-80 h-80 bg-blue-500/15 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 right-1/3 w-80 h-80 bg-cyan-500/15 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
  </div>
  
  <div class="max-w-5xl mx-auto px-6 py-10 relative z-10">
    <h1 class="text-5xl font-extrabold mb-12 mt-8 bg-gradient-to-r from-white to-white bg-clip-text text-transparent">
      Riwayat Peminjaman
    </h1>

    @if($riwayat->count())
      <div class="space-y-4">
        @foreach($riwayat as $item)
          <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-xl p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 hover:border-white/40 hover:bg-white/15 transition-all duration-300 group">
            <!-- Glassmorphic card with improved spacing and responsive layout -->
            <div class="flex-1">
              <h2 class="font-bold text-xl text-white group-hover:text-blue-300 transition-colors">{{ $item->book->judul }}</h2>
              <div class="mt-3 space-y-2 text-sm">
                <p class="text-slate-300">Tanggal Pinjam: <span class="font-medium text-blue-300">{{ $item->tanggal_pinjam->format('d M Y') }}</span></p>
                @if($item->tanggal_kembali)
                  <p class="text-slate-300">Dikembalikan: <span class="font-medium text-green-400">{{ $item->tanggal_kembali->format('d M Y') }}</span></p>
                @else
                  <p class="text-slate-300">Status: <span class="font-medium text-yellow-400">{{ ucfirst($item->status) }}</span></p>
                @endif
              </div>
            </div>
            <div class="flex-shrink-0">
              <img src="{{ asset('storage/' . $item->book->gambar) }}" class="w-20 h-28 object-cover rounded-lg shadow-lg border border-white/20" alt="">
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="text-center py-20">
        <div class="text-6xl mb-4">📖</div>
        <p class="text-slate-400 text-lg italic">Belum ada riwayat peminjaman</p>
      </div>
    @endif
  </div>
</section>
</x-app-layout>
