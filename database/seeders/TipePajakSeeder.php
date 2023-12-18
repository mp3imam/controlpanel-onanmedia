<?php

namespace Database\Seeders;

use App\Models\TipePajakModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_pajak'=>'K/0','nama'=>'Kawin tanpa Tanggungan'],
            ['kode_pajak'=>'K/1','nama'=>'Kawin dengan 1 Tanggungan'],
            ['kode_pajak'=>'K/2','nama'=>'Kawin dengan 2 Tanggungan'],
            ['kode_pajak'=>'K/3','nama'=>'Kawin dengan 3 Tanggungan'],
            ['kode_pajak'=>'TK/0','nama'=>'Tidak Kawin tanpa Tanggungan'],
            ['kode_pajak'=>'TK/1','nama'=>'Tidak Kawin Kawin dengan 1 Tanggungan'],
            ['kode_pajak'=>'TK/2','nama'=>'Tidak Kawin Kawin dengan 2 Tanggungan'],
            ['kode_pajak'=>'TK/3','nama'=>'Tidak Kawin Kawin dengan 3 Tanggungan'],
        ];
        foreach ($data as $d) {
            TipePajakModel::create($d);
        }
    }
}
