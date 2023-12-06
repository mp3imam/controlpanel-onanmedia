<?php

namespace Database\Seeders;

use App\Models\TblDataKaryawanGaji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TblDataKaryawanGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TblDataKaryawanGaji::insert([
            ['id'    => 123, 'gaji' => '\xc30d040703028f34e32d5401a67c6ad23401bc3d8299b3a7447c3aa40f61b5e3dbf93b0af7b45aaf336dbc153ea4a611f5b87a1062a5b9a58da7fd4eea23840bfbaf9ff925'],
            ['id'    => 123, 'gaji' => '\xc30d040703028f34e32d5401a67c6ad23401bc3d8299b3a7447c3aa40f61b5e3dbf93b0af7b45aaf336dbc153ea4a611f5b87a1062a5b9a58da7fd4eea23840bfbaf9ff925'],
        ]);
    }
}
