<?php

namespace Database\Seeders;

use App\Models\RiwayatKaryawanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['data_karyawan_id' => 1, 'nama' => 'Morzell Digital', 'masuk' => '2017-09-21', 'keluar' => '2021-12-31', 'alasan' => 'Pindah Ke Indosat'],
            ['data_karyawan_id' => 1, 'nama' => 'Indosat Ooredoo', 'masuk' => '2022-01-01', 'keluar' => '2022-09-01', 'alasan' => 'Habis Kontrak'],
            ['data_karyawan_id' => 1, 'nama' => 'PowerCommerceAsia', 'masuk' => '2022-09-01', 'keluar' => '2023-03-01', 'alasan' => 'Habis Kontrak'],
            ['data_karyawan_id' => 1, 'nama' => 'Hanatekindo Mulia Abadi', 'masuk' => '2023-03-01', 'keluar' => '2023-09-01', 'alasan' => 'Habis Kontrak'],
        ];
        foreach ($data as $d) {
            RiwayatKaryawanModel::create($d);
        }
    }
}
