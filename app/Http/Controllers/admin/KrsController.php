<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KrsController extends Controller
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
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->orderBy('nim')->get();
        return view('admin.krs.index', compact('krs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();
        $matakuliah = Matakuliah::orderBy('nama_mk')->get();
        return view('admin.krs.create', compact('mahasiswa', 'matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|exists:mahasiswa,nim',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if KRS already exists
        $existingKrs = Krs::where('nim', $request->nim)
            ->where('kode_mk', $request->kode_mk)
            ->first();

        if ($existingKrs) {
            return redirect()->back()
                ->withErrors(['kode_mk' => 'Mahasiswa sudah mengambil mata kuliah ini'])
                ->withInput();
        }

        Krs::create($request->all());

        return redirect()->route('admin.krs.index')
            ->with('success', 'KRS berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Krs $krs)
    {
        return view('admin.krs.show', compact('krs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Krs $krs)
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();
        $matakuliah = Matakuliah::orderBy('nama_mk')->get();
        return view('admin.krs.edit', compact('krs', 'mahasiswa', 'matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Krs $krs)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|exists:mahasiswa,nim',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if KRS already exists (excluding current record)
        $existingKrs = Krs::where('nim', $request->nim)
            ->where('kode_mk', $request->kode_mk)
            ->where('id', '!=', $krs->id)
            ->first();

        if ($existingKrs) {
            return redirect()->back()
                ->withErrors(['kode_mk' => 'Mahasiswa sudah mengambil mata kuliah ini'])
                ->withInput();
        }

        $krs->update($request->all());

        return redirect()->route('admin.krs.index')
            ->with('success', 'KRS berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Krs $krs)
    {
        $krs->delete();
        return redirect()->route('admin.krs.index')
            ->with('success', 'KRS berhasil dihapus');
    }
} 