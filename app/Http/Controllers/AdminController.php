<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pinjaman;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Admin::all();
        return view('admin.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('buku', 'public');
        } else {
            dd('file gambar tidak ada!');
        }

        Admin::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path ?? null,
        ]);

        return redirect()->route('admin.index')->with('success', 'Buku berhasil ditambahkan!');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    }

    public function showBooks()
    {
        $books = Admin::latest()->get();
        return view('pinjam', compact('books'));
    }

    public function pinjamBuku(Request $request, $id)
    {
    $book = Admin::findOrFail($id);

    // Cek apakah user udah pernah pinjam buku ini dan belum dikembalikan
    $cek = Pinjaman::where('user_id', Auth::id())
        ->where('book_id', $book->id)
        ->where('status', 'Dipinjam')
        ->first();

    if ($cek) {
        return back()->with('error', 'Kamu masih meminjam buku ini!');
    }

    // Simpan data pinjaman
    Pinjaman::create([
        'user_id' => Auth::id(),
        'book_id' => $book->id,
        'tanggal_pinjam' => now(),
    ]);

    return back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function riwayat()
    {
        $riwayat = \App\Models\Pinjaman::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('riwayat', compact('riwayat'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Admin::findOrFail($id);
        return view('admin.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $book = Admin::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // kalau upload gambar baru
    if ($request->hasFile('gambar')) {
        // hapus gambar lama
        if ($book->gambar && file_exists(storage_path('app/public/' . $book->gambar))) {
            unlink(storage_path('app/public/' . $book->gambar));
        }

        // simpen gambar baru
        $path = $request->file('gambar')->store('buku', 'public');
        $book->gambar = $path;
    }

    // update data lainnya
    $book->update([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'deskripsi' => $request->deskripsi,
        'gambar' => $book->gambar,
    ]);

    return redirect()->route('admin.index')->with('success', 'Buku berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $book = Admin::find($id);

    if ($book) {
        // Hapus gambar dari storage kalau ada
        if ($book->gambar && file_exists(storage_path('app/public/' . $book->gambar))) {
            unlink(storage_path('app/public/' . $book->gambar));
        }

        $book->delete();
    }

    return redirect()->route('admin.index')->with('success', 'Buku berhasil dihapus!');
    }
}
