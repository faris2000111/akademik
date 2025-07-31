<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:dosen,nip',
            'username' => 'required|string|unique:dosen,username',
            'password' => 'required|string|min:6',
            'nama' => 'required|string',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string',
            'role' => 'required|in:admin,kaprodi,dosen',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        Dosen::create($validated);
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nip)
    {
        $dosen = Dosen::findOrFail($nip);
        $validated = $request->validate([
            'username' => 'required|string|unique:dosen,username,' . $nip . ',nip',
            'nama' => 'required|string',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string',
            'role' => 'required|in:admin,kaprodi,dosen',
            'password' => 'nullable|string|min:6',
        ]);
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $dosen->update($validated);
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diupdate.');
    }

    public function destroy($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
} 