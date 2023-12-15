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

            $menu = [
                [
                    'name'                  => 'Dashboard',
                    'module_icon'           => 'ri-dashboard-fill',
                    'module_url'            => 'dashboard',
                    'module_parent'         => 0,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'OnanApps',
                    'module_icon'           => 'ri-dashboard-fill',
                    'module_url'            => 'onanApps',
                    'module_parent'         => 0,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Role Users',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'users',
                    'module_parent'         => 23,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Users',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'users_public',
                    'module_parent'         => 2,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Transaksi',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'transaksi',
                    'module_parent'         => 2,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1

                ],[
                    'name'                  => 'Daftar Tender',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'daftar_tender',
                    'module_parent'         => 2,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Daftar Product Jasa',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'daftar_product_jasa',
                    'module_parent'         => 2,
                    'module_position'       => 6,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Request Pencarian Dana',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'request_pencarian_dana',
                    'module_parent'         => 2,
                    'module_position'       => 7,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Finance',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'sideOnanApps',
                    'module_parent'         => 0,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Coa',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_coa',
                    'module_parent'         => 9,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Bank & Cash',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_bank_cash',
                    'module_parent'         => 9,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Kas',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_kas',
                    'module_parent'         => 9,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Belanja',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_belanja',
                    'module_parent'         => 9,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'HRD',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'hrd',
                    'module_parent'         => 0,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Data Karyawan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'data_karyawan',
                    'module_parent'         => 14,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Data Absensi',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'data_absensi',
                    'module_parent'         => 14,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Data',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_data',
                    'module_parent'         => 0,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Bahasa',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'bahasa',
                    'module_parent'         => 17,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Kategori',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'kategori',
                    'module_parent'         => 17,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'SubKategori',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'subkategori',
                    'module_parent'         => 17,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pekerjaan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pekerjaan',
                    'module_parent'         => 17,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pendidikan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pendidikan',
                    'module_parent'         => 17,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pengaturan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pengaturan',
                    'module_parent'         => 0,
                    'module_position'       => 6,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Role Page',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'users_role_page',
                    'module_parent'         => 23,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Help Desk',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'helpdesk',
                    'module_parent'         => 0,
                    'module_position'       => 7,
                    'module_description'    => '',
                    'module_status'         => 1
                ]
            ];

            foreach ($menu as $m) {
                Permission::create($m);
            }

            $role = [
                ['name'=>'administrator'],
                ['name'=>'finance'],
                ['name'=>'hrd'],
                ['name'=>'customer_service'],
            ];

            $users = [
                [
                    'id' => 1,
                    'username' => 'Administrator',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'susan',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 2,
                    'username' => 'Finance',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'susan',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 3,
                    'username' => 'Hrd',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'susan',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 4,
                    'username' => 'Customer Service',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'susan',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ]
            ];

            // create user administrator & roles
            $administratorRole = Role::create($role[0]);
            $administratorUser = User::create($users[0]);
            $administratorRole->givePermissionTo(Permission::all());
            $administratorUser->assignRole($administratorRole);
            // end

            // create user Finance & roles
            $financeRole = Role::create($role[1]);
            $financeUser = User::create($users[1]);
            $financeRole->givePermissionTo(['Dashboard','Finance','Master Coa','Master Bank & Cash','Master Kas','Master Belanja','Pengaturan','Role Users']);
            $financeUser->assignRole($financeRole);
            // end

            // create user HRD & roles
            $hrdRole = Role::create($role[2]);
            $hrdUser = User::create($users[2]);
            $hrdRole->givePermissionTo(['Dashboard','HRD','Data Karyawan','Data Absensi','Pengaturan','Role Users']);
            $hrdUser->assignRole($hrdRole);
            // end

            // create user Costumer Service & roles
            $csRole = Role::create($role[3]);
            $csUser = User::create($users[3]);
            $csRole->givePermissionTo(['Dashboard','Pengaturan','Role Users']);

            $csUser->assignRole($csRole);
            // end

            DB::commit();
        }catch(\Exception $e){
            echo $e;
            DB::rollback();
        }
    }
}
