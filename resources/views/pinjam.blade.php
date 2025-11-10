<x-app-layout>
<section class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <header class="mb-10">
      <div class="flex items-center justify-between gap-6">
        <div class="mt-12">
          <h1 class="text-4xl sm:text-5xl font-extrabold">Daftar Buku 📚</h1>
          <p class="mt-2 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">
            Koleksi buku literasi digital yang bisa kamu baca dan unduh langsung dari website Inkuiri.
          </p>
        </div>
      </div>
    </header>

    <!-- Grid daftar buku -->
    <main>
      <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($books as $book)
          <li x-data="{ open: false }" 
              class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all">
            <div class="flex flex-col h-full">

              <!-- Cover -->
              <div class="h-44 bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                @if($book->gambar)
                  <img src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                @else
                  <span class="text-gray-500 dark:text-gray-300 font-semibold">Tanpa Gambar</span>
                @endif
              </div>

              <!-- Detail -->
              <div class="p-4 flex-1 flex flex-col">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $book->judul }}</h3>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 flex-1">
                  {{ Str::limit($book->deskripsi, 120) }}
                </p>
                <div class="mt-4 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                  <div>{{ $book->penulis ?? 'Anonim' }}</div>
                  <div>&copy; Inkuiri Press</div>
                </div>

                <div class="mt-4">
                  <button 
                    @click="open = true"
                    class="inline-block w-full text-center py-2 rounded-md bg-indigo-600 text-white text-sm hover:bg-indigo-700 transition">
                    Lihat Detail
                  </button>
                </div>
              </div>
            </div>

            <!-- Modal Detail -->
            <div 
              x-show="open" 
              x-transition 
              class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4"
            >
              <div 
                @click.away="open = false"
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg max-w-md w-full overflow-hidden"
              >
                <!-- Header Modal -->
                <div class="relative">
                  @if($book->gambar)
                    <img src="{{ asset('storage/' . $book->gambar) }}" class="w-full h-64 object-cover">
                  @endif
                  <button 
                    @click="open = false"
                    class="absolute top-2 right-2 bg-black/60 text-white rounded-full w-8 h-8 flex items-center justify-center text-xl font-bold">
                    &times;
                  </button>
                </div>

                <!-- Body Modal -->
                <div class="p-6 space-y-3">
                  <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $book->judul }}</h2>
                  <p class="text-sm text-gray-500 dark:text-gray-400">Penulis: {{ $book->penulis ?? 'Anonim' }}</p>
                  <p class="mt-3 text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $book->deskripsi }}</p>

                  <!-- Tombol Pinjam -->
                  <form action="{{ route('pinjam.buku', $book->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">
                        Beli Buku
                    </button>
                </form>
                </div>
              </div>
            </div>
          </li>
        @empty
          <li class="col-span-3 text-center text-gray-400 py-20 italic">
            Belum ada buku yang tersedia 📖
          </li>
        @endforelse
      </ul>
    </main>

  </div>
</section>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
