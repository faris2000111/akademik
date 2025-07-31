<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
        $this->middleware('dosen');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = Ruang::orderBy('nama_ruang')->get();
        return view('admin.ruang.index', compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required|max:50|unique:ruang,nama_ruang',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Ruang::create($request->all());

        return redirect()->route('admin.ruang.index')
            ->with('success', 'Ruang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        return view('admin.ruang.show', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        return view('admin.ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required|max:50|unique:ruang,nama_ruang,' . $ruang->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ruang->update($request->all());

        return redirect()->route('admin.ruang.index')
            ->with('success', 'Ruang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        try {
            $ruang->delete();
            return redirect()->route('admin.ruang.index')
                ->with('success', 'Ruang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.ruang.index')
                ->with('error', 'Ruang tidak dapat dihapus karena masih terkait dengan jadwal');
        }
    }
} 