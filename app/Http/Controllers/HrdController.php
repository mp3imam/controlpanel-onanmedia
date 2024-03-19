<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawanModel;
use App\Models\DataKaryawanPekerjaanModel;
use App\Models\DataKaryawanPersonalModel;
use App\Models\KeluargaKaryawanModel;
use App\Models\PendidikanKaryawanModel;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class HrdController extends Controller
{
    private $title = 'Data Karyawan';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:'.Permission::whereId(14)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('hrd.index', $title);
    }

    function get_datatable(Request $request){
        return DataTables::of($this->models($request))
        // ->addColumn('divisis', function ($row){
        //     return $row->divisis ? $row->divisis->nama : '';
        // })
        // ->addColumn('gaji', function ($row){
        //     return $row->gaji->gaji;
        // })
        // ->addColumn('tanggal_masuk', function ($row){
        //     return Carbon::parse($row->created_at)->format('d-m-Y');
        // })
        // ->rawColumns(['divisis','gaji','tanggal_masuk'])

        ->make(true);
    }

    function tabel_karyawan_keluarga(Request $request){
        return DataTables::of(
            // KeluargaKaryawanModel::whereDataKaryawanId($request->id)->with(['agama_keluarga'])->get()
            KeluargaKaryawanModel::whereDataKaryawanId(1)->with(['agama_keluarga'])->get()
        )
        ->addColumn('usia', function ($row){
            return Carbon::parse($row->tanggal_lahir)->age;
        })
        ->addColumn('agama', function ($row){
            return $row->agama_keluarga->nama;
        })
        ->addColumn('hubungan_id', function ($row){
            $hubungan = [
                1 => 'Ayah',
                2 => 'Ibu',
                3 => 'Suami/Istri',
                4 => 'Saudara',
                5 => 'Anak'
            ];
            return $hubungan[$row->hubungan] ?? '';
        })
        ->rawColumns(['usia','agama'])

        ->make(true);
    }

    function tabel_karyawan_pendidikan(Request $request){
        return DataTables::of(
            PendidikanKaryawanModel::whereDataKaryawanId(1)->with(['agama_keluarga'])->get()
        )
        ->addColumn('usia', function ($row){
            return Carbon::parse($row->tanggal_lahir)->age;
        })
        ->addColumn('agama', function ($row){
            return $row->agama_keluarga->nama;
        })
        ->addColumn('hubungan_id', function ($row){
            $hubungan = [
                1 => 'Ayah',
                2 => 'Ibu',
                3 => 'Suami/Istri',
                4 => 'Saudara',
                5 => 'Anak'
            ];
            return $hubungan[$row->hubungan] ?? '';
        })
        ->rawColumns(['usia','agama'])

        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('hrd.create', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validasi = [
            'nama' => 'required',
            'email' => 'required',
            'divisis' => 'required',
            'no_hp' => 'required',
            'no_rek' => 'required',
            'create_date' => 'required',
            'kontrak' => 'required',
            'gaji' => 'required',
            'alamat' => 'required'
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $user = 'Data Tidak Tersimpan';
        // DB::beginTransaction();
        // try{
            // Store your file into directory and db
            $user = new TblDataKaryawan();
            $user->id     = TblDataKaryawan::orderBy('id','desc')->first()->id+1;
            $user->nama             = $request->nama;
            $user->email            = $request->email;
            $user->divisis          = $request->divisis;
            $user->no_hp            = $request->no_hp;
            $user->no_rek           = $request->no_rek;
            $user->create_date      = $request->create_date;
            $user->kontrak          = $request->kontrak;
            $user->gaji             = $request->gaji;
            $user->alamat           = $request->alamat;
            $user->status_pegawai   = 1;
            $user->save();

        //     DB::commit();
        // }catch(\Exception $e){
        //     DB::rollback();
        // }

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::with(['agama_personal'])->whereId($id)->first();
        dd($detail);

        return view('users.detail', $title, compact(['detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::with(['agama_personal','pendidikan_terakhir_banget'])->whereId($id)->first();
        // dd($detail);

        return view('hrd.edit', $title, compact(['detail']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validasi = [
            'nama' => 'required',
            'email' => 'required',
            'divisis' => 'required',
            'no_hp' => 'required',
            'no_rek' => 'required',
            'create_date' => 'required',
            'kontrak' => 'required',
            'gaji' => 'required',
            'alamat' => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $user = 'Data Tidak Tersimpan';
        DB::beginTransaction();
        try{
            // Store your file into directory and db
            $update = [
                'nama' => $request->pendidikan,
            ];

            $user = UserPublicModel::findOrFail($id)->update($update);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => UserPublicModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return DataKaryawanModel::
        // with(['divisis','gaji'])->
        when($request->cari, function($q) use($request){
            $q->where('nama','like', '%'.$request->cari.'%');
        })
        ->get();
    }

    public function pdf(Request $request){
        $datas = $this->models($request);
        $satker['name']     = "Kejati DKI Jakarta";
        $satker['address']  = "Jl. H. R. Rasuna Said No.2, RT.5/RW.4, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950";

        $pdf = Pdf::loadview('users.pdf',[
                'name'  => 'Data Satker',
                'satker' => $satker,
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-users-PDF');
    }

    public function simpan_karyawan_umum(Request $request){
        $validasi = [
            'nama_lengkap_umum'         => 'required',
            'nama_panggilan_umum'       => 'required',
            'alamat_ktp_umum'           => 'required',
            'alamat_domisili_umum'      => 'required',
            'tempat_lahir_umum'         => 'required',
            'tanggal_lahir_umum'        => 'required',
            'no_hp_umum'                => 'required',
            'pendidikan_id_umum'        => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = DataKaryawanModel::firstOrNew([
            'nama_lengkap'    => $request->nama_lengkap_umum,
            'tanggal_lahir'   => $request->tanggal_lahir_umum
        ]);

        $save->nama_panggilan  = $request->nama_panggilan_umum;
        $save->nik_khusus      = $request->nik_khusus_umum ?? '';
        $save->alamat_ktp      = $request->alamat_ktp_umum;
        $save->alamat_domisili = $request->alamat_domisili_umum;
        $save->agama_id        = $request->agama_id_umum;
        $save->tempat_lahir    = $request->tempat_lahir_umum;
        $save->jenis_kelamin   = $request->jenis_kelamin_umum;
        $save->no_handphone    = $request->no_hp_umum;
        $save->email           = $request->email_umum ?? '';
        $save->pendidikan_terakhir   = $request->pendidikan_id_umum;
        $save->foto            = $request->foto_umum ?? asset('images/user-dummy-img.jpg');
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_personal(Request $request){
        $time = time();
        dd(
            asset('keluarga/personal'),  $time. '.' . $request->no_ktp->extension(),
            public_path('keluarga/personal'), $time . '.' . $request->no_ktp->extension()
        );

        dd($request->no_ktp->move(public_path('keluarga/personal'), $time . '.' . $request->no_ktp->extension()));
        // dd($request->no_ktp);
        $validasi = [
            'id_update'             => 'required',
            'no_identitas_personal' => 'required',
            'nama_bank_personal'    => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = DataKaryawanPersonalModel::firstOrNew([
            'data_karyawan_id'    => $request->id_update
        ]);

        $save->no_ktp           = $request->no_identitas_personal;
        $save->no_npwp          = $request->NPWP_personal ?? '';
        $save->tipe_pajak       = $request->tipe_pajak_personal;
        $save->bank             = $request->nama_bank_personal;
        $save->no_bank          = $request->no_akun_bank_personal ?? '-';
        if ($request->no_ktp)
        $save->foto_ktp         = $request->no_ktp('');
        $request->no_ktp->move(public_path('keluarga/personal'), $time . '.' . $request->no_ktp->extension());
        if ($request->no_kk)
        $save->foto_kk          =
        $request->no_ktp->move(public_path('keluarga/personal'), $time . '.' . $request->foto_kk->extension());
        $save->no_kesehatan     = $request->no_kesehatan_personal ?? '';
        $save->tunjangan_pajak  = $request->tunjangan_pajak_personal ?? '';
        $save->no_ketenagakerjaan = $request->no_ketenagakerjaan_personal ?? '';
        $save->tunjangan_pajak_dalam_persen = $request->tunjangan_pajak_dalam_persen_personal ?? '';
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_pekerjaan(Request $request){
        $validasi = [
            'cabang_pekerjaan'      => 'required',
            'departement_pekerjaan' => 'required',
            'jabatan_pekerjaan'     => 'required',
            'status_kontrak'        => 'required',
            'periode_kontrak'       => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = DataKaryawanPekerjaanModel::firstOrNew([
            'data_karyawan_id'    => $request->id_update
        ]);

        $save->cabang_id      = $request->cabang_pekerjaan;
        $save->departement_id = $request->departement_pekerjaan;
        $save->jabatan_id     = $request->jabatan_pekerjaan;
        $save->status_kontrak = $request->status_kontrak;
        $save->tanggal_masuk  = $request->kontrak_masuk;
        $save->cost_center_id = 0;
        $save->kontrak_selesai = $request->kontrak_selesai;
        $save->potongan_terlambat = $request->potongan_terlambat;
        $save->toleransi_keterlambatan = $request->toleransi_keterlambatan;
        $save->absen_diluar_kantor = $request->absen_diluar_kantor;
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_keluarga(Request $request){
        $validasi = [
            'nama'          => 'required',
            'tanggal_lahir' => 'required',
            'agama_id'      => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = KeluargaKaryawanModel::firstOrNew([
            // 'data_karyawan_id'    => $request->id_update
            // Testing
            'data_karyawan_id'    => 1
        ]);

        $save->nama      = $request->nama;
        $save->agama_id  = $request->agama_id;
        $save->no_hp     = $request->no_hp;
        $save->hubungan  = $request->hubungan;
        $save->pekerjaan = $request->pekerjaan;
        $save->tgl_lahir = $request->tanggal_lahir;
        $save->alamat    = $request->alamat;
        $save->save();












        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_pendidikan(Request $request){
        $validasi = [
            'nama'          => 'required',
            'tanggal_lahir' => 'required',
            'agama_id'      => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = KeluargaKaryawanModel::firstOrNew([
            // 'data_karyawan_id'    => $request->id_update
            // Testing
            'data_karyawan_id'    => 1
        ]);

        $save->nama      = $request->nama;
        $save->agama_id  = $request->agama_id;
        $save->no_hp     = $request->no_hp;
        $save->hubungan  = $request->hubungan;
        $save->pekerjaan = $request->pekerjaan;
        $save->tgl_lahir = $request->tanggal_lahir;
        $save->alamat    = $request->alamat;
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

}
