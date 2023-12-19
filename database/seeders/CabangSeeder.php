<?php

namespace Database\Seeders;

use App\Models\CabangModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'Kantor Pusat', 'alamat' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790'],
        ];
        foreach ($data as $d) {
            CabangModel::create($d);
        }
    }
}
