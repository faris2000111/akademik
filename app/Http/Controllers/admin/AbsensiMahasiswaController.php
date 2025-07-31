<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Matakuliah;
use App\Models\Golongan;
use App\Models\Ruang;
use App\Models\Mahasiswa;
use App\Models\JadwalAkademik;
use App\Models\AbsensiMahasiswa;
use Illuminate\Support\Facades\DB;

class AbsensiMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $dosen = Auth::user();
        
        // Ambil jadwal yang terkait dengan dosen (berdasarkan role)
        $jadwal = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])
            ->when($dosen->role !== 'admin', function($query) use ($dosen) {
                // Jika bukan admin, filter berdasarkan jadwal yang diampu dosen
                // Ini bisa disesuaikan dengan logika pengampu mata kuliah
                return $query;
            })
            ->get();

        $matakuliah = $jadwal->pluck('matakuliah')->unique();
        $ruang = $jadwal->pluck('ruang')->unique();
        $golongan = $jadwal->pluck('golongan')->unique();

        $selectedMatkul = $request->kode_mk;
        $selectedGolongan = $request->id_gol;
        $selectedRuang = $request->id_ruang;
        $mahasiswas = collect();

        if ($selectedMatkul && $selectedGolongan && $selectedRuang) {
            // Ambil mahasiswa berdasarkan golongan dan mata kuliah yang diambil
            $mahasiswas = Mahasiswa::where('id_gol', $selectedGolongan)
                ->whereHas('krs', function($query) use ($selectedMatkul) {
                    $query->where('kode_mk', $selectedMatkul);
                })
                ->get();
        }

        return view('admin.absen.mahasiswa', compact(
            'matakuliah', 
            'golongan', 
            'ruang', 
            'mahasiswas', 
            'selectedMatkul', 
            'selectedGolongan', 
            'selectedRuang'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|array',
            'kode_mk' => 'required',
            'id_ruang' => 'required',
            'id_gol' => 'required',
        ]);

        $dosen = Auth::user();
        
        foreach ($request->nim as $nim) {
            // Check if attendance already exists for today
            $existingAttendance = AbsensiMahasiswa::where('nim', $nim)
                ->where('kode_mk', $request->kode_mk)
                ->where('id_ruang', $request->id_ruang)
                ->where('id_gol', $request->id_gol)
                ->whereDate('waktu', today())
                ->first();

            if (!$existingAttendance) {
                AbsensiMahasiswa::create([
                    'nim' => $nim,
                    'kode_mk' => $request->kode_mk,
                    'id_ruang' => $request->id_ruang,
                    'id_gol' => $request->id_gol,
                    'waktu' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Absensi mahasiswa berhasil disimpan!');
    }
} 