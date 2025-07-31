<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_mahasiswa';
    protected $fillable = [
        'nim',
        'kode_mk',
        'id_ruang',
        'id_gol',
        'waktu',
    ];

    /**
     * Get the mahasiswa that owns the absensi
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    /**
     * Get the matakuliah that owns the absensi
     */
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Get the ruang that owns the absensi
     */
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    /**
     * Get the golongan that owns the absensi
     */
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }
} 