<?php

namespace Database\Seeders;

use App\Models\DepartementModel;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'HRD', 'kode' => 'HRD'],
        ];
        foreach ($data as $d) {
            DepartementModel::create($d);
        }
    }
}
