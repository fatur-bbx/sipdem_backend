<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;

class DonaturController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_donatur' => 'required|string',
            'alamat_email' => 'required|email|unique:donatur,alamat_email',
            'telp_donatur' => 'required|string',
            'status' => 'required|string',
        ]);

        $donatur = Donatur::create($validatedData);

        return response()->json($donatur, 201);
    }

    public function index()
    {
        $donatur = Donatur::all();

        return response()->json($donatur);
    }

    public function show($id)
    {
        $donatur = Donatur::findOrFail($id);

        return response()->json($donatur);
    }

    public function update(Request $request, $id)
    {
        $donatur = Donatur::findOrFail($id);

        $validatedData = $request->validate([
            'nama_donatur' => 'required|string',
            'alamat_email' => 'required|email|unique:donatur,alamat_email,' . $donatur->id_donatur,
            'telp_donatur' => 'required|string',
            'status' => 'required|string',
        ]);

        $donatur->update($validatedData);

        return response()->json($donatur);
    }

    public function delete($id)
    {
        $donatur = Donatur::findOrFail($id);

        $donatur->delete();

        return response()->json(null, 204);
    }
}
