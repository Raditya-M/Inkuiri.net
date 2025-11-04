<x-app-layout>
  <section class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 py-12">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mt-12 border border-gray-100 dark:border-gray-700">
      
      <h1 class="text-3xl font-extrabold text-center mb-10">Tambah Buku Baru 📘</h1>

      <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div>
          <label class="block text-sm font-semibold mb-2">Judul Buku</label>
          <input type="text" name="judul"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            placeholder="Masukkan judul buku..." required>
        </div>

        <!-- Penulis -->
        <div>
          <label class="block text-sm font-semibold mb-2">Penulis</label>
          <input type="text" name="penulis"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            placeholder="Masukkan nama penulis..." required>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-sm font-semibold mb-2">Deskripsi</label>
          <textarea name="deskripsi" rows="4"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none resize-none"
            placeholder="Tuliskan deskripsi singkat buku..." required></textarea>
        </div>

        <!-- Gambar -->
        <div>
          <label class="block text-sm font-semibold mb-2">Gambar Buku</label>
          <input type="file" name="gambar" accept="image/*"
            class="block w-full text-sm text-gray-900 dark:text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer"
            required>
        </div>

        <!-- Tombol Simpan -->
        <div class="text-center pt-4">
          <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg font-medium shadow transition">
            Simpan Buku
          </button>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>
