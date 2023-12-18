<?php

namespace Database\Seeders;

use App\Models\AgamaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'Islam'],
            ['nama'=>'Kristen Protestan'],
            ['nama'=>'Kristen Katolik'],
            ['nama'=>'Hindu'],
            ['nama'=>'Budha'],
            ['nama'=>'konghucu']
        ];
        foreach ($data as $d) {
            AgamaModel::create($d);
        }
    }
}
