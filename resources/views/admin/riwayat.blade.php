<x-app-layout>
  <div class="max-w-4xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold mb-6 mt-12 text-gray-800 dark:text-gray-100">📚 Riwayat Peminjaman (Admin)</h1>

    @if($riwayat->count())
      <div class="space-y-4">
        @foreach($riwayat as $item)
          <div class="bg-white dark:bg-gray-800 rounded-lg p-5 flex justify-between items-center shadow-sm border border-gray-200 dark:border-gray-700">
            <div>
              <h2 class="font-semibold text-white text-lg">{{ $item->book->judul }}</h2>
              <p class="text-sm text-gray-500">
                Pembeli: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $item->user->name }}</span>
              </p>
              <p class="text-sm text-gray-500">Tanggal Beli: {{ $item->tanggal_pinjam->format('d M Y') }}</p>

              @if($item->tanggal_kembali)
                <p class="text-sm text-green-500">Dikembalikan: {{ $item->tanggal_kembali->format('d M Y') }}</p>
              @else
                <p class="text-sm text-green-500">Status: {{ ucfirst($item->status) }}</p>
              @endif
            </div>

            <div>
              <img src="{{ asset('storage/' . $item->book->gambar) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $item->book->judul }}">
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-500 text-center italic">Belum ada riwayat peminjaman 📖</p>
    @endif
  </div>
</x-app-layout>
