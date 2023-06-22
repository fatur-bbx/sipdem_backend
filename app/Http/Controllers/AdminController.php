<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email|unique:admins,email',
        ]);

        $admin = Admin::create($validatedData);

        return response()->json($admin, 201);
    }

    public function index()
    {
        $admins = Admin::all();

        return response()->json($admins);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id_admin,
        ]);

        // Update data admin
        $admin->update($validatedData);

        return response()->json($admin);
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(null, 204);
    }
}
