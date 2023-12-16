<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class OnanmediaAPIController extends Controller
{
    public function roles(Request $request){
        $roles = Role::query()->select('id', 'name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $roles->all()
        ];

        return response()->json($data);
    }

    public function select2_kategori(Request $request){
        $roles = KategoriModel::active()->select('id', 'nama as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('nama','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $roles->all()
        ];

        return response()->json($data);
    }

    public function select2_parent(Request $request){
        $roles = Permission::select('id', 'name')
        ->where('module_parent',0)
        ->orderBy('id')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $roles->all()
        ];

        return response()->json($data);
    }
}
