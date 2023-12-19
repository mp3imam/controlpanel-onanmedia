<?php

namespace Database\Seeders;

use App\Models\StatusKontrakModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusKontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'Kontrak'],
            ['nama'=>'Permanent/Kontrak'],
            ['nama'=>'Lainnya'],
        ];
        foreach ($data as $d) {
            StatusKontrakModel::create($d);
        }
    }
}
