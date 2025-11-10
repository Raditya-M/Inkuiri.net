<x-app-layout>
<section 
  x-data="{ open: false, selectedBook: null }"
  class="min-h-screen text-white relative overflow-hidden py-12">

  <!-- Animated background orbs -->
  <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl opacity-20 animate-pulse"></div>
  <div class="absolute -bottom-8 right-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl opacity-20 animate-pulse delay-2000"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <header class="mb-12 mt-8">
      <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-white to-white bg-clip-text text-transparent pb-2">
        Koleksi Buku
      </h1>
      <p class="mt-4 text-lg text-slate-300 max-w-2xl leading-relaxed">
        Jelajahi dan pinjam koleksi lengkap buku literasi digital kami. Akses mudah dan nyaman untuk semua pengguna.
      </p>
    </header>

    <main>
      <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($books as $book)
        <li class="group relative backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl overflow-hidden hover:border-white/40 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/20">
          <!-- Cover -->
          <div class="h-48 bg-gradient-to-br from-slate-700 to-slate-800 flex items-center justify-center overflow-hidden">
            @if($book->gambar)
              <img src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            @else
              <span class="text-slate-400 font-semibold">Tanpa Gambar</span>
            @endif
          </div>

          <!-- Detail -->
          <div class="p-6 flex flex-col">
            <h3 class="text-xl font-bold">{{ $book->judul }}</h3>
            <p class="mt-3 text-sm text-slate-300 flex-1 leading-relaxed">
              {{ Str::limit($book->deskripsi, 120) }}
            </p>
            <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
              <div class="font-medium">{{ $book->penulis ?? 'Anonim' }}</div>
              <div>&copy; Inkuiri Press</div>
            </div>

            <div class="mt-6">
              <button
                @click="open = true; selectedBook = @js([
                  'id' => $book->id,
                  'judul' => $book->judul,
                  'penulis' => $book->penulis ?? 'Anonim',
                  'penerbit' => $book->penerbit ?? '-',
                  'tahun_terbit' => $book->tahun_terbit ?? '-',
                  'deskripsi' => $book->deskripsi ?? '-',
                  'gambar' => $book->gambar ? asset('storage/' . $book->gambar) : null,
                ])"
                class="w-full py-3 px-4 rounded-lg font-semibold bg-blue-500 text-white hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-blue-500/50">
                Lihat Detail
              </button>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </main>
  </div>

  <!-- MODAL (global, bukan di dalam li) -->
  <div 
    x-show="open"
    x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
  >
    <div 
      @click.outside="open = false"
      class="relative backdrop-blur-xl bg-gradient-to-br from-slate-800 to-slate-900 border border-white/10 rounded-3xl shadow-2xl max-w-2xl w-full overflow-hidden"
    >
      <button 
        @click="open = false"
        class="absolute top-4 right-4 bg-white/10 hover:bg-white/20 text-white rounded-full w-10 h-10 flex items-center justify-center transition-all border border-white/20">
        ✕
      </button>

      <template x-if="selectedBook">
        <div class="grid grid-cols-1 md:grid-cols-5">
          <!-- Image -->
          <div class="md:col-span-2 bg-slate-700 flex items-center justify-center">
            <template x-if="selectedBook.gambar">
              <img :src="selectedBook.gambar" class="w-full h-full object-cover">
            </template>
            <template x-if="!selectedBook.gambar">
              <span class="text-slate-400">Tanpa Gambar</span>
            </template>
          </div>

          <!-- Details -->
          <div class="md:col-span-3 p-8 flex flex-col">
            <h2 class="text-3xl font-bold mb-2" x-text="selectedBook.judul"></h2>
            <p class="text-slate-400 mb-4 text-sm" x-text="'Penulis: ' + selectedBook.penulis"></p>
            <p class="text-slate-400 mb-4 text-sm" x-text="'Penerbit: Inkuiri'"></p>
            <p class="text-slate-200 text-sm flex-1 leading-relaxed" x-text="selectedBook.deskripsi"></p>

            <form :action="'/pinjam/' + selectedBook.id" method="POST" class="mt-6">
              @csrf
              <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold py-3 rounded-xl hover:from-blue-600 hover:to-cyan-600 transition-all duration-300">
                Pinjam Buku
              </button>
            </form>
          </div>
        </div>
      </template>
    </div>
  </div>

</section>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-app-layout>
