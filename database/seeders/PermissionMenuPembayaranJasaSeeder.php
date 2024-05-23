<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionMenuPembayaranJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Pembayaran Jasa',
            'alias' => 'Pembayaran Jasa',
            'module_icon' => 'ri-dashboard-fill',
            'module_url' => 'pembayaran_jasa',
            'module_parent' => 9,
            'module_position' => 5,
            'module_description' => '',
            'module_status'=> 1
        ]);
    }
}
