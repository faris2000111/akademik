<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '210001001',
                'nama' => 'Andi Saputra',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Melati No. 1, Bandung',
                'nohp' => '081234567800',
                'semester' => 3,
                'id_gol' => 1,
            ],
            [
                'nim' => '210001002',
                'nama' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Kenanga No. 2, Bandung',
                'nohp' => '081234567801',
                'semester' => 3,
                'id_gol' => 1,
            ],
            [
                'nim' => '210001003',
                'nama' => 'Citra Dewi',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Mawar No. 3, Bandung',
                'nohp' => '081234567802',
                'semester' => 5,
                'id_gol' => 2,
            ],
            [
                'nim' => '210001004',
                'nama' => 'Dedi Kurniawan',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Anggrek No. 4, Bandung',
                'nohp' => '081234567803',
                'semester' => 5,
                'id_gol' => 2,
            ],
            [
                'nim' => '210001005',
                'nama' => 'Eka Pratama',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Dahlia No. 5, Bandung',
                'nohp' => '081234567804',
                'semester' => 7,
                'id_gol' => 3,
            ],
        ];

        foreach ($mahasiswas as $mhs) {
            Mahasiswa::updateOrCreate(
                ['nim' => $mhs['nim']],
                $mhs
            );
        }
    }
} 