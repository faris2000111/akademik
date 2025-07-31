<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
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
        $matakuliah = Matakuliah::orderBy('kode_mk')->get();
        return view('admin.matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mk' => 'required|unique:matakuliah,kode_mk|max:10',
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Matakuliah::create($request->all());

        return redirect()->route('admin.matakuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('admin.matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validator = Validator::make($request->all(), [
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $matakuliah->update($request->except('kode_mk'));

        return redirect()->route('admin.matakuliah.index')
            ->with('success', 'Mata kuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        try {
            $matakuliah->delete();
            return redirect()->route('admin.matakuliah.index')
                ->with('success', 'Mata kuliah berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.matakuliah.index')
                ->with('error', 'Mata kuliah tidak dapat dihapus karena masih terkait dengan data lain');
        }
    }
} 