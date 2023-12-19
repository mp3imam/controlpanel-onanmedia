<?php

namespace Database\Seeders;

use App\Models\MsCostModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'General']
        ];
        foreach ($data as $d) {
            MsCostModel::create($d);
        }
    }
}
