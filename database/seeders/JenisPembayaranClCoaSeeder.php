<?php

namespace Database\Seeders;

use App\Models\MasterCoaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPembayaranClCoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [4,5,6,7,8,9];
        foreach ($datas as $data) {
            MasterCoaModel::find($data)->update(['jenis' => 1]);
        }
        MasterCoaModel::find(4)->update(['jenis' => 0]);
    }
}
