<x-app-layout>
  <div class="max-w-6xl mx-auto py-12 px-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8 mt-10">
      <h1 class="text-4xl font-extrabold text-white tracking-tight">📚 Daftar Buku</h1>
      <a 
        href="{{ route('admin.create') }}" 
        class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition-all duration-200 shadow-md"
      >
        + Tambah Buku
      </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-800 bg-gray-900/70 backdrop-blur-sm">
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
                  <img 
                    src="{{ asset('storage/' . $book->gambar) }}" 
                    alt="{{ $book->judul }}" 
                    class="w-20 h-28 object-cover rounded-md shadow-sm"
                  >
                @else
                  <span class="text-gray-500 italic">Tanpa Gambar</span>
                @endif
              </td>
              <td class="px-6 py-4 flex items-center gap-3">
                <!-- Tombol Edit -->
                <a 
                  href="{{ route('admin.edit', $book->id) }}" 
                  class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-black text-sm font-semibold rounded-lg hover:bg-yellow-400 transition"
                >
                  ✏️ Edit
                </a>

                <!-- Tombol Delete -->
                <form action="{{ route('admin.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus buku ini? 😢')">
                  @csrf
                  @method('DELETE')
                  <button 
                    type="submit" 
                    class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-500 transition"
                  >
                    🗑️ Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">
                Belum ada buku yang ditambahkan 📭
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>
