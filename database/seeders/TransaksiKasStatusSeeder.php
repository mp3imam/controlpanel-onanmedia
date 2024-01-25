<?php

namespace Database\Seeders;

use App\Models\TransasksiKasStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiKasStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransasksiKasStatusModel::created([
            [
                'name' => 'Persetujuan',
                'slug' => 'persetujuan',
            ],[
                'name' => 'Pending',
                'slug' => 'pending',
            ],[
                'name' => 'Proses',
                'slug' => 'proses',
            ],[
                'name' => 'Tolak',
                'slug' => 'tolak',
            ],[
                'name' => 'Selesai',
                'slug' => 'selesai',
            ]
        ]);
    }
}
