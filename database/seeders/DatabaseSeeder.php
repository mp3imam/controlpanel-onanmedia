<?php

namespace Database\Seeders;

use App\Models\TmModule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // TmModuleSeeder::class,
            PermissionTableSeeder::class,
            ClcoaSeeder::class,
            TblDataKaryawanGajiSeeder::class,
        ]);
        // $this->call(ProvinsiSeeder::class);
        // $this->call(SatkerSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        // $this->call(CategoryBeritaSeeder::class);
        // $this->call(MenuNotifSeeder::class);
        // $this->call(ActiveModelSeeder::class);
        // $this->call(FAQSeeder::class);
        // $this->call([PermissionTableSeeder::class,
        // ProvinsiSeeder::class,
        // SatkerSeeder::class]);
    }
}