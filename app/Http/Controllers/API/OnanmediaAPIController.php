<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BankModel;
use App\Models\DivisiModel;
use App\Models\KategoriModel;
use App\Models\MasterCoaModel;
use App\Models\MataUang;
use App\Models\UserPublicModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class OnanmediaAPIController extends Controller
{
    public function roles(Request $request){
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

    public function select2_mata_uangs(Request $request){
        $datas = MataUang::select('id','nama')
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
        $dataBank = BankModel::selectRaw('id, nama as name, 0 as data')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        });

        $bankMergeCoa = MasterCoaModel::selectRaw('CAST(id as integer), uraian as name, 1 as data')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->unionAll($dataBank)->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_belanja(Request $request){
        $bankMergeCoa = MasterCoaModel::select('id','uraian as name')
        ->where('kdrek1',5)
        ->where('type','D')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_header_coa(Request $request){
        $bankMergeCoa = MasterCoaModel::select('id','uraian as name')
        ->where('kdrek2',0)
        ->where('kdrek3',0)
        ->where('type','H')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_deskrispi_coa(Request $request){
        $bankMergeCoa = MasterCoaModel::select('id','uraian as name')
        ->where('kdrek2','!=',0)
        ->where('kdrek3',0)
        ->where('type','H')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_uraian_coa(Request $request){
        $bankMergeCoa = MasterCoaModel::select('id','uraian as name')
        ->where('kdrek2','!=',0)
        ->where('kdrek3','!=',0)
        ->where('type','H')
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_banks_coa(Request $request){
        $bankMergeCoa = MasterCoaModel::select('id','uraian as name')
        ->where('jenis',1)
        ->when($request->id, function($q) use($request) {
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request) {
            return $q->where('name','like','%'.$request->q.'%');
        })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }
}
