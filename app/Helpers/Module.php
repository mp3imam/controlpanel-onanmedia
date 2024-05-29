<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class Module
{
    public static function getModule($id)
    {
        return [
            'menu' => Permission::select('permissions.*')
                ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
                ->where('roles.id', $id)
                ->where('module_parent', 0)
                ->where('module_status', 1)
                ->where('permissions.is_deleted', 0)
                ->orderBy('module_parent', 'ASC')
                ->orderBy('module_position', 'ASC')
                ->get(),
        ];
    }

    public static function getSubModule($id, $parent)
    {
        return Permission::select('permissions.*')
            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->where('roles.id', $id)
            ->where('module_parent', $parent)
            ->where('permissions.is_deleted', 0)
            ->where('module_status', 1)
            ->orderBy('module_parent', 'ASC')
            ->orderBy('module_position', 'ASC')
            ->get();
    }

    public static function getSubModuleUrl($id, $parent)
    {
        $data = Permission::join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->where('roles.id', $id)
            ->where('module_parent', $parent)
            ->where('module_status', 1)
            ->where('permissions.is_deleted', 0)
            ->orderBy('module_parent', 'ASC')
            ->orderBy('module_position', 'ASC')
            ->get('module_url')
            ->toArray();

        $collect = collect();
        foreach ($data as $d) {
            $collect->push($d['module_url']);
        }

        return $collect;
    }

    public static function getMenu()
    {
        return json_decode(file_get_contents(storage_path() . "/app/admin.txt"), true);
    }

    public static function permission()
    {
        return Permission::where('module_status', 1)->get();
    }

    public static function rolehas()
    {
        return DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", Auth::user()->roles[0]->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
    }
}