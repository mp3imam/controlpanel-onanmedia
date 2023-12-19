<?php

namespace Database\Seeders;

use App\Models\JabatanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama'=>'Manager', 'kode' => 'Manager'],
        ];
        foreach ($data as $d) {
            JabatanModel::create($d);
        }
    }
}
