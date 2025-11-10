<x-app-layout>
  <div class="max-w-6xl mx-auto py-12 px-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8 mt-10">
      <h1 class="text-4xl font-extrabold text-white tracking-tight">📚 Daftar Buku</h1>

      <div class="flex items-center gap-3">
        <!-- Tombol Tambah Event -->
        <a 
          href="{{ route('admin.event.create') }}" 
          class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-emerald-700 transition-all duration-200 shadow-md"
        >
          🎉 Tambah Event
        </a>

        <!-- Tombol Tambah Buku -->
        <a 
          href="{{ route('admin.create') }}" 
          class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition-all duration-200 shadow-md"
        >
          + Tambah Buku
        </a>
      </div>
    </div>

    <!-- Table Buku -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-800 bg-gray-900/70 backdrop-blur-sm mb-16">
      <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-800/80">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Judul</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Penulis</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Deskripsi</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Gambar</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-700 text-gray-200">
          @forelse($books as $book)
            <tr class="hover:bg-gray-800/60 transition-colors duration-200">
              <td class="px-6 py-4 font-medium">{{ $book->judul }}</td>
              <td class="px-6 py-4">{{ $book->penulis }}</td>
              <td class="px-6 py-4 text-gray-400">{{ Str::limit($book->deskripsi, 80) }}</td>
              <td class="px-6 py-4">
                @if($book->gambar)
                  <img src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}" class="w-20 h-28 object-cover rounded-md shadow-sm">
                @else
                  <span class="text-gray-500 italic">Tanpa Gambar</span>
                @endif
              </td>
              <td class="px-6 py-4 flex items-center gap-3">
                <a href="{{ route('admin.edit', $book->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-black text-sm font-semibold rounded-lg hover:bg-yellow-400 transition">✏️ Edit</a>
                <form action="{{ route('admin.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus buku ini? 😢')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-500 transition">🗑️ Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">Belum ada buku yang ditambahkan 📭</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Section Event -->
    <div class="mt-16">
      <h2 class="text-4xl font-extrabold text-white mb-6">📅 Daftar Event</h2>
      <div class="overflow-hidden rounded-xl shadow-lg border border-gray-800 bg-gray-900/70 backdrop-blur-sm">
        <table class="min-w-full divide-y divide-gray-700">
          <thead class="bg-gray-800/80">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Judul</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Tanggal</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Deskripsi</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Gambar</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700 text-gray-200">
            @forelse($events as $event)
              <tr class="hover:bg-gray-800/60 transition-colors duration-200">
                <td class="px-6 py-4 font-medium">{{ $event->judul }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                <td class="px-6 py-4 text-gray-400">{{ Str::limit($event->deskripsi, 80) }}</td>
                <td class="px-6 py-4">
                  @if($event->gambar)
                    <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}" class="w-20 h-20 object-cover rounded-md shadow-sm">
                  @else
                    <span class="text-gray-500 italic">Tanpa Gambar</span>
                  @endif
                </td>
                <td class="px-6 py-4 flex items-center gap-3">
                  <a href="{{ route('admin.event.edit', $event->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-black text-sm font-semibold rounded-lg hover:bg-yellow-400 transition">✏️ Edit</a>
                  <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus event ini? 😢')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-500 transition">🗑️ Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">Belum ada event yang ditambahkan 🎈</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
