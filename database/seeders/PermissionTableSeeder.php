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
                    'alias'                 => 'Dashboard',
                    'module_icon'           => 'ri-dashboard-fill',
                    'module_url'            => 'dashboard',
                    'module_parent'         => 0,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'OnanApps',
                    'alias'                 => 'OnanApps',
                    'module_icon'           => 'ri-dashboard-fill',
                    'module_url'            => 'onanApps',
                    'module_parent'         => 0,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Role Users',
                    'alias'                 => 'Role Users',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'users',
                    'module_parent'         => 23,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Users',
                    'alias'                 => 'Users',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'users_public',
                    'module_parent'         => 2,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Transaksi',
                    'alias'                 => 'Transaksi',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'transaksi',
                    'module_parent'         => 2,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1

                ],[
                    'name'                  => 'Daftar Tender',
                    'alias'                 => 'Daftar Tender',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'daftar_tender',
                    'module_parent'         => 2,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Daftar Product Jasa',
                    'alias'                 => 'Daftar Product Jasa',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'daftar_product_jasa',
                    'module_parent'         => 2,
                    'module_position'       => 6,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Request Pencarian Dana',
                    'alias'                 => 'Request Pencarian Dana',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'request_pencarian_dana',
                    'module_parent'         => 2,
                    'module_position'       => 7,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Finance',
                    'alias'                 => 'Finance',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'sideOnanApps',
                    'module_parent'         => 0,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Rekening Bank',
                    'alias'                 => 'Rekening Bank',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_coa',
                    'module_parent'         => 9,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Transaksi Kas',
                    'alias'                 => 'Transaksi Kas',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_bank_cash',
                    'module_parent'         => 9,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Transaksi Belanja',
                    'alias'                 => 'Transaksi Belanja',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_kas_belanja',
                    'module_parent'         => 9,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Jurnal Umum',
                    'alias'                 => 'Jurnal Umum',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_jurnal',
                    'module_parent'         => 9,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'HRD',
                    'alias'                 => 'HRD',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'hrd',
                    'module_parent'         => 0,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Data Karyawan',
                    'alias'                 => 'Data Karyawan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'data_karyawan',
                    'module_parent'         => 14,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Data Absensi',
                    'alias'                 => 'Data Absensi',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'data_absensi',
                    'module_parent'         => 14,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Master Data',
                    'alias'                 => 'Master Data',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'master_data',
                    'module_parent'         => 0,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Bahasa',
                    'alias'                 => 'Bahasa',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'bahasa',
                    'module_parent'         => 17,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Kategori',
                    'alias'                 => 'Kategori',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'kategori',
                    'module_parent'         => 17,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'SubKategori',
                    'alias'                 => 'SubKategori',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'subkategori',
                    'module_parent'         => 17,
                    'module_position'       => 3,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pekerjaan',
                    'alias'                 => 'Pekerjaan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pekerjaan',
                    'module_parent'         => 17,
                    'module_position'       => 4,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pendidikan',
                    'alias'                 => 'Pendidikan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pendidikan',
                    'module_parent'         => 17,
                    'module_position'       => 5,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Pengaturan',
                    'alias'                 => 'Pengaturan',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'pengaturan',
                    'module_parent'         => 0,
                    'module_position'       => 6,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Role Page',
                    'alias'                 => 'Role Page',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'user_role_page',
                    'module_parent'         => 23,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Help Desk',
                    'alias'                 => 'Help Desk',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'helpdesk',
                    'module_parent'         => 0,
                    'module_position'       => 7,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Dashboard Helpdesk',
                    'alias'                 => 'Dashboard Helpdesk',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'helpdesk_dashboard',
                    'module_parent'         => 25,
                    'module_position'       => 1,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'List Helpdest',
                    'alias'                 => 'List Helpdest',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'helpdesk_list',
                    'module_parent'         => 25,
                    'module_position'       => 2,
                    'module_description'    => '',
                    'module_status'         => 1
                ],[
                    'name'                  => 'Menu Pages',
                    'alias'                 => 'Menu Pages',
                    'module_icon'           => 'ri-file-user-fill',
                    'module_url'            => 'menu_page',
                    'module_parent'         => 23,
                    'module_position'       => 3,
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
                ['name'=>'help_desk'],
                ['name'=>'direktur'],
            ];

            $users = [
                [
                    'id' => 1,
                    'username' => 'Administrator',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'admin',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 2,
                    'username' => 'amalina',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'finance',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 3,
                    'username' => 'Hrd',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'hrd',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 4,
                    'username' => 'Customer Service',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'customer service',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 5,
                    'username' => 'Adian',
                    'password' => bcrypt('12345678'),
                    'status' => 1,
                    'nama_lengkap' => 'HelpDesk',
                    'cl_perusahaan_id' => 1,
                    'cl_user_group_id' => 1,
                    'update_date' => '2023-11-14',
                    'update_by' => 'administrator'
                ],[
                    'id' => 6,
                    'username' => 'Direktur',
                    'password' => bcrypt('3333'),
                    'status' => 1,
                    'nama_lengkap' => 'Bapak Dolok Biantara Siregar',
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
            $financeRole->givePermissionTo(['Dashboard','Finance','Rekening Bank','Transaksi Kas','Transaksi Belanja','Jurnal Umum']);
            $financeUser->assignRole($financeRole);
            // end

            // create user HRD & roles
            $hrdRole = Role::create($role[2]);
            $hrdUser = User::create($users[2]);
            $hrdRole->givePermissionTo(['Dashboard','Finance','Transaksi Belanja','HRD','Data Karyawan','Data Absensi']);
            $hrdUser->assignRole($hrdRole);
            // end

            // create user Costumer Service & roles
            $csRole = Role::create($role[3]);
            $csUser = User::create($users[3]);
            $csRole->givePermissionTo(['Dashboard','Finance','Transaksi Belanja']);
            $csUser->assignRole($csRole);
            // end

            // create user Helper
            $helperRole = Role::create($role[4]);
            $helperUser = User::create($users[4]);
            $helperRole->givePermissionTo(['Dashboard','Finance','Transaksi Belanja','Help Desk','Dashboard Helpdesk','List Helpdest']);
            $helperUser->assignRole($helperRole);
            // end

            // create user Direktur
            $direkturRole = Role::create($role[5]);
            $direkturUser = User::create($users[5]);
            $direkturRole->givePermissionTo(Permission::all());
            $direkturUser->assignRole($direkturRole);
            // end

            DB::commit();
        }catch(\Exception $e){
            echo $e;
            DB::rollback();
        }
    }
}
