<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiDosen extends Model
{
    use HasFactory;
    protected $table = 'absensi_dosen';
    protected $fillable = [
        'nip',
        'waktu',
    ];

    /**
     * Get the dosen that owns the absensi
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip', 'nip');
    }
} 