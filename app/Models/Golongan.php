<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';
    protected $fillable = [
        'nama_gol'
    ];

    /**
     * Get the mahasiswa for this golongan
     */
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_gol');
    }

    /**
     * Get the jadwal for this golongan
     */
    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_gol');
    }
} 