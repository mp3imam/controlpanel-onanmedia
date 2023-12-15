<?php

namespace Database\Seeders;

use App\Models\HelpdeskStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpdeskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['nama' => 'Dibuat', 'slug' => 'dibuat', 'status' => 1],
            ['nama' => 'Pending', 'slug' => 'pending', 'status' => 1],
            ['nama' => 'Dalam Proses', 'slug' => 'dalam_proses', 'status' => 1],
            ['nama' => 'Selesai', 'slug' => 'selesai', 'status' => 1],
            ];

        foreach ($statuses as $data) {
            HelpdeskStatusModel::create($data);
        }

    }
}
