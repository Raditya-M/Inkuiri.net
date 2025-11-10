<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('event', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('event', 'public');
    }

    // Simpan ke database
    \App\Models\Event::create([
        'judul' => $request->judul,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'gambar' => $path,
    ]);

        return redirect()->route('event')->with('success', 'Event berhasil ditambahkan!');
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
    public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('admin.event.edit', compact('event'));
}

    public function update(Request $request, $id)
    {
    $event = Event::findOrFail($id);

    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('events', 'public');
        $validated['gambar'] = $path;
    }

    $event->update($validated);

    return redirect()->route('admin.index')->with('success', 'Event berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.index')->with('success', 'Event berhasil dihapus!');
    }
}
