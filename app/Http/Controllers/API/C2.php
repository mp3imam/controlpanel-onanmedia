<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BookingLayananController;
use App\Http\Controllers\Controller;
use App\Models\ActiveLayananDetailModel;
use App\Models\AntrianModel;
use App\Models\LayananModel;
use App\Models\LogActivitiesModel;
use App\Models\ProvinsiModel;
use App\Models\SatkerModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Spatie\Permission\Models\Role;

class C2 extends Controller
{
    public function index(Request $request){
        $provinsi = ProvinsiModel::with(['satkers'])
        ->when($request->id, function($q) use($request){
            return $q->whereIn('id',explode(',',$request->id));
        })
        ->when($request->q, function($q) use($request){
            $q->where('name', 'LIKE', '%'. $request->q. '%');
            $q->orWhereHas('satkers', function($q) use($request){
                return $q->where('name', 'LIKE', '%'. $request->q. '%');
            });
            return $q;
        })
        ->orderBy('name')
        ->get();

        $dataS = collect([]);
        foreach($provinsi as $p){
            $dataS->push([
                'id_provinsi' => $p->id,
                'provinsi'    => $p->name,
                'lokasi_mpp'  => $p->satkers->map(function ($satker){
                    return [
                        'id'             => $satker->id,
                        'mpp_diresmikan' => $satker->name
                    ];
                })
            ]);
        }

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $dataS
        ];

        return response()->json($data);
    }

    public function provinsi(Request $request){
        $provinsi = ProvinsiModel::select("id", "name")
            ->when($request->provinsi_id, function($q) use($request){
                return $q->whereIn('id',explode(',',$request->provinsi_id));
            })
            ->when($request->q, function($q) use($request){
                return $q->where('name', 'LIKE', '%'. $request->q. '%');
            })
            ->orderBy('name')
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $provinsi
        ];

        return response()->json($data);
    }

    public function get_antrian(Request $request){
        $antrian = AntrianModel::where('status','0')
            ->where('satker_id', $request->satker_id)
            ->where('layanan_id', $request->layanan_id)
            ->where('tanggal_hadir',date('Y-m-d'))
            ->orderBy('id')
            ->first();

        $data = [
            'status'  => Response::HTTP_OK,
            'message' => !$antrian ? "Atrian tidak ditemukan" : "Antrian Ditemukan",
            'data'    => [
                'satker'           => $antrian ? $antrian->satker : "",
                'layanan'          => $antrian ? $antrian->layanan : "",
                'antrian_saat_ini' => $antrian->nomor_antrian ?? "Tidak Ada Antrian"
            ]
        ];

        return response()->json($data);
    }

    public function users(Request $request){
        $satker = User::query()->select("id", "name", 'email')
            ->when($request->id, function($q) use($request){
                return $q->whereIn('id',explode(',',$request->id));
            })
            ->when($request->q, function($q) use($request){
                return $q->where('name', 'LIKE', '%'. $request->q. '%');
            })
            ->whereHas('roles', function($q){
                return $q->where('name','Admin');
            })
            ->orderBy('name')
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $satker
        ];

        return response()->json($data);
    }

    public function role_users(Request $request){
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

    public function satker(Request $request){
        $satkers = SatkerModel::select("id", "name")
        ->with(['provinsi'])
        ->when($request->provinsi_id, function($q) use($request){
            return $q->whereIn('provinsi_id',explode(',',$request->provinsi_id));
        })
        ->when($request->satker, function($q) use($request){
            return $q->whereId($request->satker);
        })
        ->when($request->satker_id, function($q) use($request){
            return $q->whereIn('id',$request->satker_id);
        })
        ->when($request->q, function($q) use($request){
            return $q->where('name','like','%'.$request->q.'%');
        })
        ->orderBy('name')
        ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $satkers
        ];

        return response()->json($data);
    }

    public function all_users(Request $request){
        $satker = User::query()->select("id", "username as name")
            ->when($request->id, function($q) use($request){
                return $q->whereIn('id',$request->id);
            })
            ->when($request->q, function($q) use($request){
                return $q->where('username', 'LIKE', '%'. $request->q. '%');
            })
            ->when($request->admin, function($q){
                return $q->whereHas('roles', function($q){
                    return $q->where('name','Admin');
                });
            })
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $satker
        ];

        return response()->json($data);
    }

    public function layanan(Request $request){
        $layanan = LayananModel::query()
            ->when($request->layanan_id, function($q) use($request){
                return $q->whereIn('id',$request->layanan_id);
            })
            ->when($request->q, function($q) use($request){
                return $q->where('name', 'LIKE', '%'. $request->q. '%');
            })
            ->orderBy('id')
            ->get();

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $layanan
        ];

        return response()->json($data);
    }

    public function layanan_persatkers(Request $request){
        $layanan_satkers = SatkerModel::with(['active_layanans'])
        ->whereHas('active_layanans', function($q) use($request){
            return $q->where('satker_id', $request->satker_id);
        })
        ->get();

        $layanan_satker = collect();
        $layanan_satkers->each(function($satkers) use($layanan_satker){
            $satkers->active_layanans->each(function ($layanan) use($layanan_satker){
                if ($layanan->status !== 0 && $layanan->layanans !== null){
                    $layanan_satker->push([
                        'id'        => $layanan->layanans->id,
                        'name'      => $layanan->layanans->name,
                        'deskripsi' => $layanan->layanans->deskripsi ?? "-",
                        'icon'      => $layanan->layanans->icon ?? "-",
                        'createdAt' => $layanan->layanans->created_at,
                        'updatedAt' => $layanan->layanans->updated_at
                    ]);
                }
            });
        });

        $data = [
            'status' => Response::HTTP_OK,
            'data'   => $layanan_satker->sort()->values()->all()
        ];

        return response()->json($data);
    }

    public function layanan_satker(Request $request){
        $layanan = LayananModel::query()
            ->when($request->id, function($q) use($request){
                return $q->whereIn('id',$request->id);
            })
            ->when($request->q, function($q) use($request){
                return $q->where('name', 'LIKE', '%'. $request->q. '%');
            })
            ->orderBy('name')
            ->get();

        $Activelayanan = ActiveLayananDetailModel::query()
            ->when($request->id, function($q) use($request){
                return $q->whereId($request->id);
            })
            ->get();

        $data = [
            'status'        => Response::HTTP_OK,
            'dataLayanan'   => $layanan,
            'activeLayanan' => $Activelayanan
        ];

        return response()->json($data);
    }

    public function mst_layanan(){
        $payload = [
            "status"=> 200,
            "data"  => [
                [
                    "id"            =>1,
                    "satker_id"     =>1,
                    "layanan"       =>"Pengembalian Barang Bukti",
                    "deskripsi"     =>"-",
                    "createdAt"     =>"2023-03-16T07:08:16.913Z",
                    "updatedAt"     =>"2023-03-16T07:08:16.913Z"
                ],
                [
                    "id"            =>2,
                    "satker_id"     =>1,
                    "layanan"       =>"Pengembalian Tilang",
                    "deskripsi"     =>"-",
                    "createdAt"     =>"2023-03-16T07:08:35.072Z",
                    "updatedAt"     =>"2023-03-16T07:08:35.072Z"
                ],
                [
                    "id"            =>3,
                    "satker_id"     =>1,
                    "layanan"       =>"Besuk Tahanan",
                    "deskripsi"     =>"-",
                    "createdAt"     =>"2023-03-16T07:08:49.244Z",
                    "updatedAt"     =>"2023-03-16T07:08:49.244Z"
                ],
                [
                    "id"            =>4,
                    "satker_id"     =>1,
                    "layanan"       =>"Penuluhan Hukum",
                    "deskripsi"     =>"-",
                    "createdAt"     =>"2023-03-16T07:09:10.391Z",
                    "updatedAt"     =>"2023-03-16T07:09:10.391Z"
                ],
                [
                    "id"            =>5,
                    "satker_id"     =>1,
                    "layanan"       =>"Pendampingan Hukum",
                    "deskripsi"     =>"-",
                    "createdAt"     =>"2023-03-16T07:09:26.709Z",
                    "updatedAt"     =>"2023-03-16T07:09:26.709Z"
                ]
            ]
        ];

        return response()->json($payload);
    }

    public function store(Request $request){
        $validasi = [
            'provinsi_id'   => 'required',
            'provinsi'      => 'required',
            'satker_id'     => 'required',
            'satker'        => 'required',
            'user_id'       => 'required',
            'user'          => 'required',
            'no_hp'         => 'nullable',
            'tanggal_hadir' => 'required',
            'layanan_id'    => 'required',
            'layanan'       => 'required',
            'keterangan'    => 'nullable',
        ];

        $image = $request->file('image');
        if ($image) $validasi += ['image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg'];

        $validator = Validator::make($request->all(), $validasi);
        $agent = new Agent();

        if ($validator->fails()) {
            if(!$agent->isDesktop())
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'error'  => $validator->messages()
            ]);

            return back()->withErrors($validator->messages());
        }

        $tanggal_hadir  = Carbon::parse($request->tanggal_hadir)->format('Y-m-d');
        $date           = date('Y-m-d');
        $antrian_model  = AntrianModel::whereTanggalHadir($tanggal_hadir)
        ->whereSatkerId($request->satker_id)
        ->whereLayananId($request->layanan_id);
        $id             = $antrian_model->latest()->count();

        if ($antrian_model->whereUserId($request->user_id)->exists()){
            if(!$agent->isDesktop())
            return response()->json([
                'status'    => Response::HTTP_CONFLICT,
                'message'   => 'Error Duplicate'
            ]);

            return back()->withErrors(['Duplicate' => 'Anda sudah melakukan booking di Satker '.$request->satker.' pada Layanan '.$request->layanan]);
        }

        $nomor_antrian  = sprintf("%04s", $id+1);
        $qrcode         = $date."|".$nomor_antrian."|".$request->satker."|".$request->layanan;

        $filename = null;
        if($image){
            $filename = str_replace(" ","-", date('Y-m-d-H:i:s')."-".$image->getClientOriginalName());
            Image::make($image->getRealPath())->resize(468, 249)->save('images/'.$filename);
        }

        if($agent->isDesktop() && $request->image){
            $folderPath     = "images/";
            $image_parts    = explode(";base64,", $request->image);
            $image_base64   = base64_decode($image_parts[1]);
            $filename       = uniqid() . '.png';
            $file           = $folderPath . $filename;
            file_put_contents($file, $image_base64);
        }

        //Store your file into directory and db
        $save = new AntrianModel();
        $save->provinsi_id      = $request->provinsi_id;
        $save->provinsi         = Str::of($request->provinsi)->trim;
        $save->satker_id        = $request->satker_id;
        $save->satker           = Str::of($request->satker)->trim;
        $save->user_id          = $request->user_id;
        $save->user             = $request->user;
        $save->tanggal_hadir    = $tanggal_hadir;
        $save->no_hp            = $request->no_hp;
        $save->layanan_id       = $request->layanan_id;
        $save->layanan          = Str::of($request->layanan)->trim;
        $save->keterangan       = $request->keterangan;
        $save->nomor_antrian    = $nomor_antrian;
        $save->qrcode           = $qrcode;
        $save->image            = ($image || $request->image) ? $filename : null;
        $save->save();

        $response = response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Success',
            'data'      => [
                'provinsi'      => $request->provinsi,
                'satker'        => $request->satker,
                'user'          => $request->user,
                'no_hp'         => $request->no_hp,
                'tanggal_hadir' => $request->tanggal_hadir,
                'layanan'       => $request->layanan,
                'keterangan'    => $request->keterangan,
                'nomor_antrian' => $nomor_antrian,
                'qrcode'        => $qrcode,
                'image'         => $filename,
            ]
        ]);

        if(!$agent->isDesktop()) return $response;

        return redirect()->route('booking.index');
    }

    public function list_history($id){
        $data = AntrianModel::whereUserId($id)->latest()->get();

        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Success',
            'data'      => $data
        ]);
    }

    public function get_menu(Request $request){
        $data = LogActivitiesModel::query()
        ->when($request->id, function($q) use($request){
            return $q->whereIn('id',$request->id);
        })
        ->when($request->q, function($q) use($request){
            return $q->where('name', 'like', '%'.$request->q.'%');
        })
        ->get();

        $collect = collect();
        $data->each(function ($array) use($collect) {
            if (!$array || !$collect->contains('id', $array->subject))
            return $collect->push([
                'id' => $array->subject,
                'name' => $array->subject
            ]);
        });

        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Success',
            'data'      => $collect->sort()->values()->all()
        ]);
    }
}

