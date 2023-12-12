<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = public_path('sql/_Account__202312121610.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
