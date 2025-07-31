<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matakuliah = [
            [
                'kode_mk' => 'IF101',
                'nama_mk' => 'Pemrograman Dasar',
                'sks' => 3,
                'semester' => 1
            ],
            [
                'kode_mk' => 'IF102',
                'nama_mk' => 'Algoritma dan Struktur Data',
                'sks' => 3,
                'semester' => 2
            ],
            [
                'kode_mk' => 'IF201',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3
            ],
            [
                'kode_mk' => 'IF202',
                'nama_mk' => 'Basis Data',
                'sks' => 3,
                'semester' => 3
            ],
            [
                'kode_mk' => 'IF301',
                'nama_mk' => 'Pemrograman Mobile',
                'sks' => 3,
                'semester' => 5
            ],
            [
                'kode_mk' => 'IF302',
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 5
            ],
        ];

        foreach ($matakuliah as $mk) {
            Matakuliah::create($mk);
        }
    }
} 