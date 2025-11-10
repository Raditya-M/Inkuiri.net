<x-app-layout>
  <section class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white py-12">
    <!-- Applied modern glassmorphism design with gradient background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
      <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan-500/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    </div>
    
    <div class="max-w-3xl mx-auto px-6 relative z-10">
      <div class="mt-12 backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl p-8 hover:border-white/40 transition-all duration-300">
        
        <h1 class="text-4xl font-extrabold text-center mb-12 bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Tambah Buku Baru 📘</h1>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <!-- Judul -->
          <div>
            <label class="block text-sm font-semibold mb-3 text-slate-200">Judul Buku</label>
            <input type="text" name="judul"
              class="w-full rounded-xl border border-white/20 bg-white/5 text-white p-4 placeholder-slate-400 focus:border-blue-400 focus:bg-white/10 focus:ring-2 focus:ring-blue-500/50 focus:outline-none transition-all"
              placeholder="Masukkan judul buku..." required>
          </div>

          <!-- Penulis -->
          <div>
            <label class="block text-sm font-semibold mb-3 text-slate-200">Penulis</label>
            <input type="text" name="penulis"
              class="w-full rounded-xl border border-white/20 bg-white/5 text-white p-4 placeholder-slate-400 focus:border-blue-400 focus:bg-white/10 focus:ring-2 focus:ring-blue-500/50 focus:outline-none transition-all"
              placeholder="Masukkan nama penulis..." required>
          </div>

          <!-- Deskripsi -->
          <div>
            <label class="block text-sm font-semibold mb-3 text-slate-200">Deskripsi</label>
            <textarea name="deskripsi" rows="5"
              class="w-full rounded-xl border border-white/20 bg-white/5 text-white p-4 placeholder-slate-400 focus:border-blue-400 focus:bg-white/10 focus:ring-2 focus:ring-blue-500/50 focus:outline-none transition-all resize-none"
              placeholder="Tuliskan deskripsi singkat buku..." required></textarea>
          </div>

          <!-- Gambar -->
          <div>
            <label class="block text-sm font-semibold mb-3 text-slate-200">Gambar Buku</label>
            <input type="file" name="gambar" accept="image/*"
              class="block w-full text-sm text-slate-300 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-blue-500 file:to-cyan-500 file:text-white hover:file:from-blue-600 hover:file:to-cyan-600 cursor-pointer transition-all"
              required>
          </div>

          <!-- Tombol Simpan -->
          <div class="text-center pt-6">
            <button type="submit"
              class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:shadow-blue-500/50 transition-all duration-300 transform hover:scale-105">
              Simpan Buku
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-app-layout>
