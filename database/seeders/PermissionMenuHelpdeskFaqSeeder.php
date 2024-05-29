<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionMenuHelpdeskFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Helpdesk FAQ',
            'alias' => 'FAQ',
            'module_icon' => 'ri-dashboard-fill',
            'module_url' => 'helpdesk_faq',
            'module_parent' => 9,
            'module_position' => 5,
            'module_description' => '',
            'module_status' => 1
        ]);

        User::whereIn('id', [1, 6])->get()->each(function ($user) {
            $user->givePermissionTo(Permission::all());
        });
    }
}