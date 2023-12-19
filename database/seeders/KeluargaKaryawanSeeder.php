<?php

namespace Database\Seeders;

use App\Models\KeluargaKaryawanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeluargaKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['data_karyawan_id' => 1, 'nama'=>'H. Mastur Tabrani', 'tgl_lahir' => '1958-12-24'],
            ['data_karyawan_id' => 1, 'nama'=>'Hj. Badriyah', 'tgl_lahir' => '1969-06-03'],
            ['data_karyawan_id' => 1, 'nama'=>'Luviah', 'tgl_lahir' => '1982-08-27'],
            ['data_karyawan_id' => 1, 'nama'=>'Achmad Khulaify', 'tgl_lahir' => '1984-02-21'],
            ['data_karyawan_id' => 1, 'nama'=>'Achmad Sulton', 'tgl_lahir' => '1987-02-12'],
            ['data_karyawan_id' => 1, 'nama'=>'Imam Tantowi', 'tgl_lahir' => '1990-07-20'],
            ['data_karyawan_id' => 1, 'nama'=>'Shafira Putri', 'tgl_lahir' => '1992-08-27'],
            ['data_karyawan_id' => 1, 'nama'=>'Achmad Wildan', 'tgl_lahir' => '1997-07-31'],
        ];
        foreach ($data as $d) {
            KeluargaKaryawanModel::create($d);
        }
    }
}
