<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    /**
     * Get the KRS records for this matakuliah
     */
    public function krs()
    {
        return $this->hasMany(Krs::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Get the jadwal records for this matakuliah
     */
    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Get the mahasiswa who take this matakuliah
     */
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'krs', 'kode_mk', 'nim');
    }
} 