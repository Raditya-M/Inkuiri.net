<x-app-layout>
<section class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
  <div class="max-w-5xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-8 mt-12">📚 Riwayat Peminjaman</h1>

    @if($riwayat->count())
      <div class="space-y-4">
        @foreach($riwayat as $item)
          <div class="bg-white dark:bg-gray-800 rounded-lg p-5 flex justify-between items-center shadow-sm border border-gray-200 dark:border-gray-700">
            <div>
              <h2 class="font-semibold text-lg">{{ $item->book->judul }}</h2>
              <p class="text-sm text-gray-500">Tanggal Pinjam: {{ $item->tanggal_pinjam->format('d M Y') }}</p>
              @if($item->tanggal_kembali)
                <p class="text-sm text-green-500">Dikembalikan: {{ $item->tanggal_kembali->format('d M Y') }}</p>
              @else
                <p class="text-sm text-yellow-500">Status: {{ $item->status }}</p>
              @endif
            </div>
            <div>
              <img src="{{ asset('storage/' . $item->book->gambar) }}" class="w-16 h-16 object-cover rounded-md" alt="">
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-500 text-center italic">Belum ada riwayat peminjaman 📖</p>
    @endif
  </div>
</section>
</x-app-layout>
