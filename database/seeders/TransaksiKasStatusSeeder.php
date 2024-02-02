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
                'name' => 'On Progress',
                'slug' => 'on_progress',
            ],[
                'name' => 'Proses',
                'slug' => 'proses',
            ],[
                'name' => 'Tolak',
                'slug' => 'tolak',
            ],[
                'name' => 'History',
                'slug' => 'history',
            ],[
                'name' => 'Pending',
                'slug' => 'pending',
            ]
        ]);
    }
}
