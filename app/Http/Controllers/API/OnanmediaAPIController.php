<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BankModel;
use App\Models\DivisiModel;
use App\Models\KategoriModel;
use App\Models\MasterCoaModel;
use App\Models\UserPublicModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class OnanmediaAPIController extends Controller
{
    public function datas(Request $request){
        $datas = Role::query()->select('id', 'name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_kategori(Request $request){
        $datas = KategoriModel::active()->select('id', 'nama as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('nama','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_parent(Request $request){
        $datas = Permission::select('id', 'name')
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
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_divisi(Request $request){
        $datas = DivisiModel::select('id', 'nama as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_users(Request $request){
        $datas = UserPublicModel::select('id', 'name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_banks(Request $request){
        $datas = BankModel::select('id', 'nama as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_banks_gabungan_kasir(Request $request){
        $datas = BankModel::select('id', 'nama as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();

        $datas1 = MasterCoaModel::select('id', 'uraian as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get();
        dd($datas, $datas1, MasterCoaModel::select('id', 'uraian as name')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->get()->merge($datas));
        // $datas->union

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }
}
