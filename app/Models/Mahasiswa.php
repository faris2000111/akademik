<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'password',
        'alamat',
        'nohp',
        'semester',
        'id_gol',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Get the golongan that owns the mahasiswa
     */
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }

    /**
     * Get the KRS records for this mahasiswa
     */
    public function krs()
    {
        return $this->hasMany(Krs::class, 'nim', 'nim');
    }

    /**
     * Get the matakuliah for this mahasiswa
     */
    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'krs', 'nim', 'kode_mk');
    }

    /**
     * Get the absensi records for this mahasiswa
     */
    public function absensi()
    {
        return $this->hasMany(AbsensiMahasiswa::class, 'nim', 'nim');
    }
} 