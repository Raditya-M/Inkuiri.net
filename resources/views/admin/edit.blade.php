<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6 text-white">
        <h1 class="text-3xl font-bold mb-8 text-center text-white">Edit Buku 📚</h1>

        <div class="bg-gray-900/70 backdrop-blur-md p-8 rounded-2xl border-gray-700">
            <form action="{{ route('admin.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div>
                    <label class="block font-semibold mb-2 text-gray-200">Judul Buku</label>
                    <input type="text" name="judul" value="{{ old('judul', $book->judul) }}"
                        class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block font-semibold mb-2 text-gray-200">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}"
                        class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block font-semibold mb-2 text-gray-200">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block font-semibold mb-2 text-gray-200">Gambar Buku</label>
                    @if ($book->gambar)
                        <img src="{{ asset('storage/' . $book->gambar) }}"
                            class="w-40 h-56 object-cover mb-3 rounded-lg shadow-md border border-gray-700">
                    @endif
                    <input type="file" name="gambar"
                        class="w-full bg-gray-800 border border-gray-600 text-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Tombol -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-5 py-2.5 rounded-lg transition-all">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg transition-all">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
