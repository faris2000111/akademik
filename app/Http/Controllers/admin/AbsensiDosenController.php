<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AbsensiDosen;

class AbsensiDosenController extends Controller
{
    public function index()
    {
        // Tampilkan form absen dosen (hanya tombol absen)
        return view('admin.absen.dosen');
    }

    public function store(Request $request)
    {
        $dosen = Auth::user();
        
        // Check if attendance already exists for today
        $existingAttendance = AbsensiDosen::where('nip', $dosen->nip)
            ->whereDate('waktu', today())
            ->first();

        if ($existingAttendance) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini!');
        }

        // Simpan absen dosen
        AbsensiDosen::create([
            'nip' => $dosen->nip,
            'waktu' => now(),
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil!');
    }
} 