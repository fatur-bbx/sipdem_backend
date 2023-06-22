<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiController extends Controller
{
    public function create(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'tgl_donasi' => 'required|date',
            'nama_rekening' => 'required|string',
            'id_donatur' => 'required|exists:donatur,id_donatur',
            'id_admin' => 'required|exists:admins,id_admin',
            'jumlah_donasi' => 'required|integer',
            'status_donasi' => 'required|string',
            'verifikasi' => 'required|string',
        ]);

        // Buat data donasi baru
        $donasi = Donasi::create($validatedData);

        return response()->json($donasi, 201);
    }

    public function index()
    {
        // Ambil semua data donasi
        $donasi = Donasi::all();

        return response()->json($donasi);
    }

    public function show($id)
    {
        // Temukan donasi berdasarkan ID
        $donasi = Donasi::findOrFail($id);

        return response()->json($donasi);
    }

    public function update(Request $request, $id)
    {
        // Temukan donasi berdasarkan ID
        $donasi = Donasi::findOrFail($id);

        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'tgl_donasi' => 'required|date',
            'nama_rekening' => 'required|string',
            'id_donatur' => 'required|exists:donatur,id_donatur',
            'id_admin' => 'required|exists:admins,id_admin',
            'jumlah_donasi' => 'required|integer',
            'status_donasi' => 'required|string',
            'verifikasi' => 'required|string',
        ]);

        // Update data donasi
        $donasi->update($validatedData);

        return response()->json($donasi);
    }

    public function delete($id)
    {
        // Temukan donasi berdasarkan ID
        $donasi = Donasi::findOrFail($id);

        // Hapus donasi
        $donasi->delete();

        return response()->json(null, 204);
    }
}
