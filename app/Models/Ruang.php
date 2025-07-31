<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $fillable = [
        'nama_ruang'
    ];

    /**
     * Get the jadwal records for this ruang
     */
    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_ruang');
    }
} 