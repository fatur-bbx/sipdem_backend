<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function create(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'judul_artikel' => 'required|string',
            'tgl_terbit' => 'required|date',
            'kategori' => 'required|string',
            'konten' => 'required|string',
            'image' => 'nullable|string',
        ]);

        // Buat data artikel baru
        $artikel = Artikel::create($validatedData);

        return response()->json($artikel, 201);
    }

    public function index()
    {
        // Ambil semua data artikel
        $artikel = Artikel::all();

        return response()->json($artikel);
    }

    public function show($id)
    {
        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        return response()->json($artikel);
    }

    public function update(Request $request, $id)
    {
        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'judul_artikel' => 'required|string',
            'tgl_terbit' => 'required|date',
            'kategori' => 'required|string',
            'konten' => 'required|string',
            'image' => 'nullable|string',
        ]);

        // Update data artikel
        $artikel->update($validatedData);

        return response()->json($artikel);
    }

    public function delete($id)
    {
        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Hapus artikel
        $artikel->delete();

        return response()->json(null, 204);
    }
}
