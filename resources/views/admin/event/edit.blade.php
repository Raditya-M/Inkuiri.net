<x-app-layout>
  <div class="max-w-3xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">✏️ Edit Event</h1>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Judul -->
      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Judul Event</label>
        <input type="text" name="judul" value="{{ old('judul', $event->judul) }}"
               class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        @error('judul')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Deskripsi -->
      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
                  class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('deskripsi', $event->deskripsi) }}</textarea>
        @error('deskripsi')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Gambar -->
      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Gambar (opsional)</label>
        <input type="file" name="gambar" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-2">
        @if($event->gambar)
          <div class="mt-2">
            <p class="text-sm text-gray-500">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $event->gambar) }}" alt="Event Image" class="w-32 h-32 object-cover rounded-lg mt-1 border">
          </div>
        @endif
      </div>

      <!-- Tombol -->
      <div class="flex justify-end space-x-3">
        <a href="{{ route('admin.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</x-app-layout>
