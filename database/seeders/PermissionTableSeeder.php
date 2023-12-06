<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try{

            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // Dashboard
            Permission::create(['name' => 'Dashboard','module_icon' => 'ri-dashboard-fill','module_url' => 'dashboard','module_parent' =>0, 'module_position' => 1,'module_description' => '', 'module_status' =>1]);
            Permission::create(['name' => 'Users','module_icon' => 'ri-file-user-fill','module_url' =>'users','module_parent' =>0, 'module_position' => 2,'module_description' => '', 'module_status' =>1]);
            Permission::create(['name' => 'Bahasa','module_icon' => 'ri-file-user-fill','module_url' =>'bahasa','module_parent' =>0, 'module_position' => 3,'module_description' => '', 'module_status' =>1]);
            Permission::create(['name' => 'Kategori','module_icon' => 'ri-file-user-fill','module_url' =>'kategori','module_parent' =>0, 'module_position' => 4,'module_description' => '', 'module_status' =>1]);
            Permission::create(['name' => 'SubKategori','module_icon' => 'ri-file-user-fill','module_url' =>'sub_kategori','module_parent' =>0, 'module_position' => 5,'module_description' => '', 'module_status' =>1]);

            $administratorRole = Role::create(['name' => 'administrator']);
            $administratorRole->givePermissionTo(Permission::all());

            $administratorUser = User::create(['id' => 1,'username' => 'administrator','password' => bcrypt('12345678'),'status' => 1,'nama_lengkap' => 'susan','cl_perusahaan_id' => 1,'cl_user_group_id' => 1,'update_date' => '2023-11-14','update_by' => 'administrator', ]);
            $administratorUser->assignRole($administratorRole);

            // create roles and for finance
            $financeRole = Role::create(['name' => 'finance']);
            $financeRole->givePermissionTo('Dashboard');

            $financeUser = User::create(['id' => 2,'username' => 'finance','status' => 1,'password' => bcrypt('12345678'),'nama_lengkap' => 'fina','cl_perusahaan_id' => 1,'cl_user_group_id' => 1,'update_date' => '2023-11-14','update_by' => 'administrator', ]);
            $financeUser->assignRole($financeRole);

            // create roles and for hrd
            $hrdRole = Role::create(['name' => 'hrd']);
            $hrdRole->givePermissionTo('Dashboard');

            $hrdUser = User::create(['id' => 3,'username' => 'hrd','status' => 1,'cl_user_group_id' => 1,'nama_lengkap' => 'hana','cl_perusahaan_id' => 1,'update_date' => '2023-11-14','update_by' => 'administrator','password' => bcrypt('12345678'), ]);
            $hrdUser->assignRole($hrdRole);

            // create roles and for cs
            $csRole = Role::create(['name' => 'cs']);
            $csRole->givePermissionTo('Dashboard');

            $csUser = User::create(['id' => 4,'username' => 'cs','status' => 1,'cl_user_group_id' => 1,'cl_perusahaan_id' => 1,'nama_lengkap' => 'cus','update_date' => '2023-11-14','update_by' => 'administrator','password' => bcrypt('12345678') ]);
            $csUser->assignRole($csRole);

            DB::commit();
        }catch(\Exception $e){
            echo $e;
            DB::rollback();
        }
    }
}
