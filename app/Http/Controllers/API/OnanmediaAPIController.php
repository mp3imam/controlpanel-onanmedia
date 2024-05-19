<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AgamaModel;
use App\Models\BankModel;
use App\Models\DepartementModel;
use App\Models\DivisiModel;
use App\Models\KategoriModel;
use App\Models\MasterCoaModel;
use App\Models\MataUang;
use App\Models\PendidikanModel;
use App\Models\SatuanModel;
use App\Models\TipePajakModel;
use App\Models\User;
use App\Models\UserPublicModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class OnanmediaAPIController extends Controller
{
    public function roles(Request $request)
    {
        $datas = Role::query()->select('id', 'name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_kategori(Request $request)
    {
        $datas = KategoriModel::active()->select('id', 'nama as name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('nama', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_parent(Request $request)
    {
        $datas = Permission::select('id', 'name')
            ->where('module_parent', 0)
            ->orderBy('id')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_divisi(Request $request)
    {
        $datas = DivisiModel::select('id', 'nama as name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_api_divisi(Request $request)
    {
        $datas = DepartementModel::select('kode as id', 'nama as name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('kode', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_users(Request $request)
    {
        $datas = UserPublicModel::select('id', 'name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_users_karyawan(Request $request)
    {
        $datas = User::select('id', 'nama_lengkap as name')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('nama_lengkap', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_banks(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => BankModel::select('id', 'nama as name', 'kode')
                ->when($request->id, function ($q) use ($request) {
                    return $q->whereIn('id', $request->id);
                })
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('nama', 'ilike', '%' . $request->q . '%');
                })
                ->get()
                ->all()
        ]);
    }

    public function select2_mata_uangs(Request $request)
    {
        $datas = MataUang::select('id', 'nama')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $datas->all()
        ];

        return response()->json($data);
    }

    public function select2_banks_gabungan_kasir(Request $request)
    {
        $dataBank = BankModel::selectRaw('id, nama as name, 0 as data')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            });

        $bankMergeCoa = MasterCoaModel::selectRaw('CAST(id as integer), uraian as name, 1 as data')
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })->unionAll($dataBank)->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_belanja(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::select('id', 'uraian as name')
                ->where('kdrek1', 5)
                ->where('type', 'D')
                ->when($request->id, function ($q) use ($request) {
                    return $q->whereIn('id', $request->id);
                })
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('uraian', 'ilike', '%' . $request->q . '%');
                })->get()
                ->all()
        ]);
    }

    public function select2_kdrek1_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::select('kdrek1 as id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
                ->where('type', 'H')
                ->when($request->id, function ($q) use ($request) {
                    return $q->whereIn('id', $request->id);
                })
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('name', 'ilike', '%' . $request->q . '%');
                })->get()->all()
        ]);
    }

    public function select2_kdrek2_coa(Request $request)
    {
        $bankMergeCoa = MasterCoaModel::select('kdrek2 as id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
            ->where('kdrek1', $request->kdrek1)
            ->where('type', 'S')
            ->when($request->id, function ($q) use ($request) {
                return $q->where('kdrek1', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_uraian_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::select('id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
                ->when($request->q, function ($q) use ($request) {
                    $q->where('uraian', 'ilike', '%' . $request->q . '%');
                })
                ->where('kdrek1', $request->kdrek1)
                ->where('kdrek2', '!=', 0)
                ->where('type', 'D')
                ->first()
        ]);
    }

    public function select2_uraian(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::select('id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
                ->when($request->q, function ($q) use ($request) {
                    $q->where('uraian', 'ilike', '%' . $request->q . '%');
                })
                ->where('kdrek1', $request->kdrek1)
                ->where('kdrek2', '!=', 0)
                ->where('kdrek2', $request->kdrek2)
                ->where('type', 'H')
                ->get()
        ]);
    }

    public function get_select2_kdrek3(Request $request)
    {
        if (
            MasterCoaModel::select('kdrek3 as id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
            ->when($request->q, function ($q) use ($request) {
                return $q->where('uraian', 'ilike', '%' . $request->q . '%');
            })
            ->where('kdrek1', $request->kdrek1)
            ->where('kdrek2', $request->kdrek2)
            ->where('type', 'C')
            ->exists()
        )
            return response()->json([
                'status' => Response::HTTP_OK,
                'data'   => MasterCoaModel::select('id', 'uraian as name', 'kdrek1', 'kdrek2', 'kdrek3')
                    ->when($request->q, function ($q) use ($request) {
                        return $q->where('uraian', 'ilike', '%' . $request->q . '%');
                    })
                    ->where('kdrek1', $request->kdrek1)
                    ->where('kdrek2', $request->kdrek2)
                    ->where('type', 'C')
                    ->get()
                    ->all()
            ]);

        return response()->json([
            'status' => Response::HTTP_PROCESSING,
            'data'   => number_format(MasterCoaModel::where('kdrek1', $request->kdrek1)->where('kdrek2', '=', $request->kdrek2)->where('type', 'D')->orderBy('kdrek', 'desc')->first()->kdrek + 0.001, 3)
        ]);
    }

    public function select2_detail_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::select('id', 'uraian as name')
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('uraian', 'ilike', '%' . $request->q . '%');
                })
                ->where('kdrek2', '!=', 0)
                ->where('kdrek3', '!=', 0)
                ->where('type', 'D')
                ->orderBy('uraian')
                ->get()
                ->all()
        ]);
    }

    public function count_kdrek1_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => count(MasterCoaModel::where('kdrek2', 0)->where('type', 'H')->orderBy('kdrek', 'desc')->get()) + 1
        ]);
    }

    public function count_kdrek2_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::where('kdrek1', $request->kdrek1)->where('type', 'S')->orderBy('kdrek', 'desc')->first()->kdrek + 1
        ]);
    }

    public function count_kdrek3_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => MasterCoaModel::where('kdrek1', $request->kdrek1)->where('kdrek2', '=', $request->kdrek2)->where('type', 'C')->orderBy('kdrek', 'desc')->first()->kdrek + 1
        ]);
    }

    public function count_kdrek_coa(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => number_format(MasterCoaModel::where('kdrek1', $request->kdrek1)->where('kdrek2', '=', $request->kdrek2)->where('kdrek3', '=', $request->kdrek3)->where('type', 'D')->orderBy('kdrek', 'desc')->first()->kdrek + 0.001, 3)
        ]);
    }

    public function get_select2_satuan_barang(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => SatuanModel::select('id', 'nama as name')
                ->where('isAktif', 1)
                ->when($request->id, function ($q) use ($request) {
                    return $q->whereIn('id', $request->id);
                })
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('nama', 'ilike', '%' . $request->q . '%');
                })->get()->all()
        ]);
    }

    public function select2_banks_coa(Request $request)
    {
        $bankMergeCoa = MasterCoaModel::select('id', 'uraian as name')
            ->where('jenis', 1)
            ->when($request->id, function ($q) use ($request) {
                return $q->whereIn('id', $request->id);
            })
            ->when($request->q, function ($q) use ($request) {
                return $q->where('name', 'ilike', '%' . $request->q . '%');
            })->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $bankMergeCoa->all()
        ];

        return response()->json($data);
    }

    public function select2_agama(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => AgamaModel::select('id', 'nama as name')
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('nama', 'ilike', '%' . $request->q . '%');
                })
                ->get()
                ->all()
        ]);
    }

    public function select2_pendidikan(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => PendidikanModel::select('id', 'nama as name')
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('nama', 'ilike', '%' . $request->q . '%');
                })
                ->get()
                ->all()
        ]);
    }

    public function select2_tipe_pajak(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => TipePajakModel::select('id', 'nama as name')
                ->when($request->q, function ($q) use ($request) {
                    return $q->where('nama', 'ilike', '%' . $request->q . '%');
                })
                ->get()
                ->all()
        ]);
    }
}
