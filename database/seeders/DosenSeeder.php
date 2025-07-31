<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosens = [
            [
                'nip' => '198501012010012001',
                'username' => 'dosen1',
                'password' => Hash::make('password123'),
                'nama' => 'Dr. Ahmad Hidayat, M.Kom',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta',
                'nohp' => '081234567890',
                'role' => 'admin',
            ],
            [
                'nip' => '198602152010012002',
                'username' => 'dosen2',
                'password' => Hash::make('password123'),
                'nama' => 'Siti Nurhaliza, S.Kom, M.T',
                'alamat' => 'Jl. Sudirman No. 456, Jakarta',
                'nohp' => '081234567891',
                'role' => 'kaprodi',
            ],
            [
                'nip' => '198703202010012003',
                'username' => 'dosen3',
                'password' => Hash::make('password123'),
                'nama' => 'Budi Santoso, S.Kom, M.Kom',
                'alamat' => 'Jl. Thamrin No. 789, Jakarta',
                'nohp' => '081234567892',
                'role' => 'dosen',
            ],
            [
                'nip' => '198804102010012004',
                'username' => 'dosen4',
                'password' => Hash::make('password123'),
                'nama' => 'Dewi Sartika, S.T, M.Kom',
                'alamat' => 'Jl. Gatot Subroto No. 321, Jakarta',
                'nohp' => '081234567893',
                'role' => 'dosen',
            ],
            [
                'nip' => '198905052010012005',
                'username' => 'dosen5',
                'password' => Hash::make('password123'),
                'nama' => 'Rudi Hermawan, S.Kom, M.T',
                'alamat' => 'Jl. Jendral Sudirman No. 654, Jakarta',
                'nohp' => '081234567894',
                'role' => 'dosen',
            ],
        ];

        foreach ($dosens as $dosen) {
            Dosen::updateOrCreate(
                ['nip' => $dosen['nip']],
                $dosen
            );
        }
    }
} 