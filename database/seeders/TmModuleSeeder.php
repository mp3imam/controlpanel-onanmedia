<?php

namespace Database\Seeders;

use App\Models\TmModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class TmModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = new Permission();
        $save->name = 'Dashboard';
        $save->guard_name = 'web';
        $save->module_icon = 'ri-dashboard-fill';
        $save->module_url = 'dashboard';
        $save->module_parent = 0;
        $save->module_position = 1;
        $save->module_description = 'Dashboard';
        $save->is_deleted = 0;
        $save->save();

        $save = new Permission();
        $save->name = 'Users';
        $save->guard_name = 'web';
        $save->module_icon = 'ri-dashboard-fill';
        $save->module_url = 'users';
        $save->module_parent = 0;
        $save->module_position = 1;
        $save->module_description = 'Users';
        $save->is_deleted = 0;
        $save->save();
    }

}
