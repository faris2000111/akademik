<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
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
        $jadwal = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])
            ->orderBy('hari')
            ->orderBy('kode_mk')
            ->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = Matakuliah::orderBy('nama_mk')->get();
        $ruang = Ruang::orderBy('nama_ruang')->get();
        $golongan = Golongan::orderBy('nama_gol')->get();
        return view('admin.jadwal.create', compact('matakuliah', 'ruang', 'golongan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'id_ruang' => 'required|exists:ruang,id',
            'id_gol' => 'required|exists:golongan,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check for schedule conflicts
        $conflict = JadwalAkademik::where('hari', $request->hari)
            ->where('id_ruang', $request->id_ruang)
            ->first();

        if ($conflict) {
            return redirect()->back()
                ->withErrors(['id_ruang' => 'Ruang sudah digunakan pada hari tersebut'])
                ->withInput();
        }

        JadwalAkademik::create($request->all());

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalAkademik $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalAkademik $jadwal)
    {
        $matakuliah = Matakuliah::orderBy('nama_mk')->get();
        $ruang = Ruang::orderBy('nama_ruang')->get();
        $golongan = Golongan::orderBy('nama_gol')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'matakuliah', 'ruang', 'golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalAkademik $jadwal)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'id_ruang' => 'required|exists:ruang,id',
            'id_gol' => 'required|exists:golongan,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check for schedule conflicts (excluding current record)
        $conflict = JadwalAkademik::where('hari', $request->hari)
            ->where('id_ruang', $request->id_ruang)
            ->where('id', '!=', $jadwal->id)
            ->first();

        if ($conflict) {
            return redirect()->back()
                ->withErrors(['id_ruang' => 'Ruang sudah digunakan pada hari tersebut'])
                ->withInput();
        }

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalAkademik $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
} 