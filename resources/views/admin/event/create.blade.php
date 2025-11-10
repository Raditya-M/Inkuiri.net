<x-app-layout>
  <div class="max-w-3xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold text-white mb-8 mt-12">✨ Tambah Event Baru</h1>

    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <div>
        <label class="block text-gray-300 mb-2">Judul Event</label>
        <input type="text" name="judul" class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-indigo-500">
      </div>

      <div>
        <label class="block text-gray-300 mb-2">Tanggal</label>
        <input type="date" name="tanggal" class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-indigo-500">
      </div>

      <div>
        <label class="block text-gray-300 mb-2">Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="w-full bg-gray-800 text-white rounded-lg border border-gray-700 px-4 py-2 focus:ring-2 focus:ring-indigo-500"></textarea>
      </div>

      <div>
        <label class="block text-gray-300 mb-2">Gambar (Opsional)</label>
        <input type="file" name="gambar" accept="image/*" class="w-full text-white">
      </div>

      <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg font-semibold shadow-md">
        Simpan Event
      </button>
    </form>
  </div>
</x-app-layout>
