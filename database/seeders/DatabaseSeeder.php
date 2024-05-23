<?php

namespace Database\Seeders;

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
            UserPanelSeeder::class,
            // HelpdeskStatusSeeder::class,
            // HelpdeskSeeder::class,
            // HelpdeskDetailSeeder::class,
            // HelpdeskFileDetailSeeder::class,

            // Data HRD
            AgamaSeeder::class,
            BankSeeder::class,
            // CabangSeeder::class,
            DepartementSeeder::class,
            JabatanSeeder::class,
            ModeAbsensiSeeder::class,
            MsCostSeeder::class,
            StatusKontrakSeeder::class,
            TipePajakSeeder::class,

            // Finance
            MataUangSeeder::class,

            // AccountSeeder::class,
            // JasaSeeder::class,
            TblDataKaryawanGajiSeeder::class,
            ClcoaSeeder::class,
            // CoaBelanjaSeeder::class,
            JenisPembayaranClCoaSeeder::class,
            TransaksiKasBelanjaStatusSeeder::class,
            SatuanSeeder::class,
            UserPanelKurangSeeder::class,
            // AdminBalasanTemplateSeeder::class,
            // PermissionMenuPembayaranJasaSeeder::class
            PermissionMenuPembayaranJasaSeeder::class
        ]);
    }
}
