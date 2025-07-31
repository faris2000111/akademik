<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruang;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruang = [
            ['nama_ruang' => 'Lab Komputer 1'],
            ['nama_ruang' => 'Lab Komputer 2'],
            ['nama_ruang' => 'Ruang Kelas A1'],
            ['nama_ruang' => 'Ruang Kelas A2'],
            ['nama_ruang' => 'Ruang Kelas B1'],
            ['nama_ruang' => 'Ruang Kelas B2'],
            ['nama_ruang' => 'Auditorium'],
            ['nama_ruang' => 'Ruang Seminar'],
        ];

        foreach ($ruang as $rng) {
            Ruang::create($rng);
        }
    }
} 