<?php

namespace Database\Seeders;

use App\Models\ModeAbsensiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModeAbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'ID Card/Email, Photo'],
            ['nama'=>'ID Card/Email']
        ];
        foreach ($data as $d) {
            ModeAbsensiModel::create($d);
        }
    }
}
