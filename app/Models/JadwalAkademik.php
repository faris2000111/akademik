<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    use HasFactory;

    protected $table = 'jadwal_akademik';
    protected $fillable = [
        'hari',
        'kode_mk',
        'id_ruang',
        'id_gol'
    ];

    /**
     * Get the matakuliah that owns the jadwal
     */
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Get the ruang that owns the jadwal
     */
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    /**
     * Get the golongan that owns the jadwal
     */
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }
} 