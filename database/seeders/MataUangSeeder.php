<?php

namespace Database\Seeders;

use App\Models\MataUang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataUangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'Rupiah','kode'=>'Rp']
        ];
        foreach ($data as $d) {
            MataUang::create($d);
        }
    }
}
