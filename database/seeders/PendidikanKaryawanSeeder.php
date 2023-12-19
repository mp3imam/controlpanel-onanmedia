<?php

namespace Database\Seeders;

use App\Models\PendidikanKaryawanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['data_karyawan_id' => 1, 'nama'=>'MI Daarul Ulum', 'tahun_lulus' => '1996'],
            ['data_karyawan_id' => 1, 'nama'=>'124 Negeri Jakarta', 'tahun_lulus' => '2002'],
            ['data_karyawan_id' => 1, 'nama'=>'SMK Bina Putra', 'jurusan' => 'Administrasi Perkantoran', 'tahun_lulus' => '2008'],
            ['data_karyawan_id' => 1, 'nama'=>'Universitas Indraprasta PGRI Jakarta', 'jurusan' => 'Teknik Informatika', 'IPK' => '2,79', 'tahun_lulus' => '2012'],
        ];
        foreach ($data as $d) {
            PendidikanKaryawanModel::create($d);
        }
    }
}
