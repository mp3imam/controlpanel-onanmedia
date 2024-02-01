<?php

namespace Database\Seeders;

use App\Models\TransaksiKasBelanjaStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiKasBelanjaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Create'],
            ['nama' => 'Pending'],
            ['nama' => 'Proses'],
            ['nama' => 'Tolak'],
            ['nama' => 'Selesai']
        ];
        foreach ($data as $d) {
            TransaksiKasBelanjaStatusModel::create($d);
        }
    }
}
