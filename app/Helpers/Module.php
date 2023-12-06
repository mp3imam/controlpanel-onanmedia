<?php

namespace App\Helpers;

use App\Models\AntrianModel;
use DB, Auth;

use Spatie\Permission\Models\Permission;
use Illuminate\Notifications\DatabaseNotification;

class Module
{
    public static function getModule($id)
    {
        $module = [
            'menu' => Permission::select('permissions.*')
                                ->join('role_has_permissions', 'permissions.id','=', 'role_has_permissions.permission_id')
                                ->join('roles','role_has_permissions.role_id', '=', 'roles.id')
                                ->where('roles.id', $id)->get(),
        ];

        return $module;
    }

    public static function getSubModule($id, $parent){
        return Permission::select('permissions.*')
                                ->join('role_has_permissions', 'permissions.id','=', 'role_has_permissions.permission_id')
                                ->join('roles','role_has_permissions.role_id', '=', 'roles.id')
                                ->where('roles.id', $id)->get();
    }

    public static function getSubModuleUrl($id, $parent){
        $data = Permission::join('role_has_permissions', 'permissions.id','=', 'role_has_permissions.permission_id')
                                ->join('roles','role_has_permissions.role_id', '=', 'roles.id')
                                ->where('roles.id', $id)
                                ->where('module_parent', $parent)
                                ->orderBy('module_position', 'ASC')->get('module_url')->toArray();

        $collect = collect();
        foreach ($data as $d) {
            $collect->push($d['module_url']);
        }

        return $collect;
    }

    public static function getMenu()
    {
        $path = storage_path() . "/app/admin.txt";

        $json = json_decode(file_get_contents($path), true);
        // dd($json);
        return $json;
    }

    public static function permission(){
        $permission = Permission::get();

        return $permission;
    }
    public static function rolehas(){
        $id = Auth::user()->roles[0]->id;

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return $rolePermissions;
    }

    public static function notif(){
        $notifications = null;
        // $notifications = auth()->user()->unreadNotifications;
        if(auth()->user()->name === 'Superadmin'){
            $notifications =   DatabaseNotification::orderBy('created_at','DESC')->limit(5)->get();

        }
        // else{
        //     $id_satker = auth()->user()->satker_id;
        //     $satker = DatabaseNotification::where('satker_id', $id_satker)->get();
        //     $notifications = auth()->user()->unreadNotifications->union($satker);
        // }

        return $notifications;
    }

    public function monitor(Request $request)
    {
        return AntrianModel::whereTanggalHadir(date('Y-m-d'))->where('status','=',"3")->first();
    }
}
