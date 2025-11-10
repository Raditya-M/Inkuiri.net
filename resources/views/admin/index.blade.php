<!-- Modern admin dashboard with glassmorphic tables, improved buttons, better spacing -->
<x-app-layout>
    <div class="pt-24 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header with Actions -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-white">Content Management</h1>
                    <p class="text-slate-400 mt-1">Manage books and events for your platform</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a 
                        href="{{ route('admin.event.create') }}" 
                        class="inline-flex items-center px-4 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-cyan-500/30"
                    >
                        ✨ Create Event
                    </a>
                    <a 
                        href="{{ route('admin.create') }}" 
                        class="inline-flex items-center px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-blue-500/30"
                    >
                        📖 Add Book
                    </a>
                </div>
            </div>

            <!-- Books Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-white mb-6">Books</h2>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-white/10">
                            <thead class="bg-white/5 border-b border-white/10">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Title</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Author</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Description</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Image</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10 text-slate-100">
                                @forelse($books as $book)
                                    <tr class="hover:bg-white/5 transition-colors duration-200">
                                        <td class="px-6 py-4 font-medium text-white">{{ $book->judul }}</td>
                                        <td class="px-6 py-4">{{ $book->penulis }}</td>
                                        <td class="px-6 py-4 text-slate-300">{{ Str::limit($book->deskripsi, 60) }}</td>
                                        <td class="px-6 py-4">
                                            @if($book->gambar)
                                                <img src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}" class="w-16 h-20 object-cover rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                            @else
                                                <span class="text-slate-500 text-sm italic">No image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.edit', $book->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500/20 hover:bg-yellow-500/30 text-yellow-300 font-semibold text-sm rounded-lg transition-colors">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('admin.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Delete this book?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-500/20 hover:bg-red-500/30 text-red-300 font-semibold text-sm rounded-lg transition-colors">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                            <p class="text-lg">No books added yet</p>
                                            <p class="text-sm mt-1">Create your first book to get started</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Events Section -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-6">Events</h2>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-white/10">
                            <thead class="bg-white/5 border-b border-white/10">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Title</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Date</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Description</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Image</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-200 uppercase tracking-wide">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10 text-slate-100">
                                @forelse($events as $event)
                                    <tr class="hover:bg-white/5 transition-colors duration-200">
                                        <td class="px-6 py-4 font-medium text-white">{{ $event->judul }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-slate-300">{{ Str::limit($event->deskripsi, 60) }}</td>
                                        <td class="px-6 py-4">
                                            @if($event->gambar)
                                                <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}" class="w-16 h-16 object-cover rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                            @else
                                                <span class="text-slate-500 text-sm italic">No image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.event.edit', $event->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500/20 hover:bg-yellow-500/30 text-yellow-300 font-semibold text-sm rounded-lg transition-colors">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Delete this event?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-500/20 hover:bg-red-500/30 text-red-300 font-semibold text-sm rounded-lg transition-colors">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                            <p class="text-lg">No events added yet</p>
                                            <p class="text-sm mt-1">Create your first event to get started</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
