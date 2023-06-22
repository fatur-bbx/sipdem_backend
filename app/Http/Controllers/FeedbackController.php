<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'isi' => 'required|string',
            'status' => 'required|string',
            'tgl_feedback' => 'required|date',
            'id_admin' => 'required|exists:admins,id_admin',
            'id_donatur' => 'required|exists:donatur,id_donatur',
            'reply' => 'nullable|string',
        ]);

        // Buat data feedback baru
        $feedback = Feedback::create($validatedData);

        return response()->json($feedback, 201);
    }

    public function index()
    {
        // Ambil semua data feedback
        $feedback = Feedback::all();

        return response()->json($feedback);
    }

    public function show($id)
    {
        // Temukan feedback berdasarkan ID
        $feedback = Feedback::findOrFail($id);

        return response()->json($feedback);
    }

    public function update(Request $request, $id)
    {
        // Temukan feedback berdasarkan ID
        $feedback = Feedback::findOrFail($id);

        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'isi' => 'required|string',
            'status' => 'required|string',
            'tgl_feedback' => 'required|date',
            'id_admin' => 'required|exists:admins,id_admin',
            'id_donatur' => 'required|exists:donatur,id_donatur',
            'reply' => 'nullable|string',
        ]);

        // Update data feedback
        $feedback->update($validatedData);

        return response()->json($feedback);
    }

    public function delete($id)
    {
        // Temukan feedback berdasarkan ID
        $feedback = Feedback::findOrFail($id);

        // Hapus feedback
        $feedback->delete();

        return response()->json(null, 204);
    }
}
