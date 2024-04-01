<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawanModel;
use App\Models\DataKaryawanPekerjaanModel;
use App\Models\DataKaryawanPersonalModel;
use App\Models\KeluargaKaryawanModel;
use App\Models\PelatihanKaryawanModel;
use App\Models\PendidikanKaryawanModel;
use App\Models\RiwayatKaryawanModel;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        // dd(DataKaryawanModel::with('pekerjaan.departement')->get());
        $this->middleware('permission:Data Karyawan');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('hrd.index', $title);
    }

    function get_datatable(Request $request)
    {
        return DataTables::of($this->models($request))
            ->addColumn('divisis', function ($row) {
                return $row->pekerjaan ? $row->pekerjaan->departement->nama : '';
            })
            ->addColumn('sisa_kontrak', function ($row) {
                return $row->pekerjaan ? (new DateTime($row->pekerjaan->kontrak_selesai))->diff(new DateTime)->format('%y tahun, %m bulan, %d hari') : '';
            })
            // ->addColumn('gaji', function ($row){
            //     return $row->gaji->gaji;
            // })
            // ->addColumn('tanggal_masuk', function ($row){
            //     return Carbon::parse($row->created_at)->format('d-m-Y');
            // })
            ->rawColumns(['divisis'])

            ->make(true);
    }

    function tabel_karyawan_keluarga(Request $request)
    {
        return DataTables::of(
            KeluargaKaryawanModel::whereDataKaryawanId($request->karyawanId)->with(['agama_keluarga'])->get()
        )
            ->addColumn('usia', function ($row) {
                return Carbon::parse($row->tanggal_lahir)->age;
            })
            ->addColumn('agama', function ($row) {
                return $row->agama_keluarga->nama;
            })
            ->addColumn('hubungan_id', function ($row) {
                $hubungan = [
                    1 => 'Ayah',
                    2 => 'Ibu',
                    3 => 'Suami/Istri',
                    4 => 'Saudara',
                    5 => 'Anak'
                ];
                return $hubungan[$row->hubungan] ?? '';
            })
            ->rawColumns(['usia', 'agama'])

            ->make(true);
    }

    function tabel_karyawan_pendidikan(Request $request)
    {
        return DataTables::of(
            PendidikanKaryawanModel::whereDataKaryawanId($request->karyawanId)->get()
        )
            ->addColumn('usia', function ($row) {
                return Carbon::parse($row->tanggal_lahir)->age;
            })
            ->addColumn('hubungan_id', function ($row) {
                $hubungan = [
                    1 => 'Ayah',
                    2 => 'Ibu',
                    3 => 'Suami/Istri',
                    4 => 'Saudara',
                    5 => 'Anak'
                ];
                return $hubungan[$row->hubungan] ?? '';
            })
            ->rawColumns(['usia', 'agama'])

            ->make(true);
    }

    function tabel_karyawan_pelatihan(Request $request)
    {
        return DataTables::of(
            PelatihanKaryawanModel::whereDataKaryawanId($request->karyawanId)->get()
        )
            ->make(true);
    }

    function tabel_karyawan_riwayat(Request $request)
    {
        return DataTables::of(
            RiwayatKaryawanModel::whereDataKaryawanId($request->karyawanId)->get()
        )
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
    public function store(Request $request)
    {
        $validasi = [
            'nama'      => 'required',
            'email'     => 'required',
            'divisis'   => 'required',
            'no_hp'     => 'required',
            'no_rek'    => 'required',
            'create_date' => 'required',
            'kontrak'   => 'required',
            'gaji'      => 'required',
            'alamat'    => 'required'
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
        $user->id     = TblDataKaryawan::orderBy('id', 'desc')->first()->id + 1;
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
    public function show(Request $request, $id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::with(['agama_personal', 'pekerjaan.departement'])->whereId($id)->first();
        dd($detail);

        return view('users.detail', $title, compact(['detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::with(['agama_personal', 'pendidikan_terakhir_banget', 'pekerjaan.departement', 'personal'])->whereId($id)->first();
        $selisih = (new DateTime($detail->pekerjaan->kontrak_selesai))->diff(new DateTime);

        $sisa_tahun = $selisih->y;
        $sisa_bulan = $selisih->m;
        $sisa_hari = $selisih->d;
        return view('hrd.edit', $title, compact(['detail', 'sisa_tahun', 'sisa_bulan', 'sisa_hari']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        try {
            // Store your file into directory and db
            $update = [
                'nama' => $request->pendidikan,
            ];

            $user = UserPublicModel::findOrFail($id)->update($update);
            DB::commit();
        } catch (\Exception $e) {
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
    public function hapus_data_data_karyawan(Request $request)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => DB::table($request->tabel)->whereId($request->id)->delete()
        ]);
    }

    public function models($request)
    {
        return DataKaryawanModel::with('pekerjaan.departement')
            ->when($request->cari, function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->cari . '%');
            })
            ->get();
    }

    public function pdf(Request $request)
    {
        $datas = $this->models($request);
        $satker['name']     = "Kejati DKI Jakarta";
        $satker['address']  = "Jl. H. R. Rasuna Said No.2, RT.5/RW.4, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950";

        $pdf = Pdf::loadview(
            'users.pdf',
            [
                'name'  => 'Data Satker',
                'satker' => $satker,
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-users-PDF');
    }

    public function simpan_karyawan_umum(Request $request)
    {
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
        if ($request->foto_umum) {
            $file = $request->file('foto_umum');

            $path = public_path('karyawan/foto/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->foto = asset('karyawan/foto/') . "/" . $imageName;
        }
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_personal(Request $request)
    {
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
        if ($request->no_ktp) {
            $file = $request->file('no_ktp');

            $path = public_path('karywan/keluarga/personal/ktp/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->foto_ktp         = asset('karywan/keluarga/personal/ktp/') . "/" . $imageName;
        }
        if ($request->no_kartu_keluarga) {
            $file = $request->file('no_kartu_keluarga');

            $path = public_path('karywan/keluarga/personal/kk/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->foto_kk         = asset('karywan/keluarga/personal/kk/') . "/" . $imageName;
        }
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

    public function simpan_karyawan_pekerjaan(Request $request)
    {
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

    public function simpan_karyawan_keluarga(Request $request)
    {
        $validasi = [
            'nama'          => 'required',
            'tanggal_lahir' => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = KeluargaKaryawanModel::firstOrNew([
            'id'               => $request->id !== 'undefined' ? $request->id : (KeluargaKaryawanModel::latest()->first()->id ?? KeluargaKaryawanModel::first()->id ?? 0) + 1,
            'data_karyawan_id' => $request->id_update
        ]);

        $save->nama      = $request->nama;
        $save->agama     = $request->agama_id;
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

    public function simpan_karyawan_pendidikan(Request $request)
    {
        $validasi = [
            'nama'          => 'required',
            'jurusan'       => 'required',
            'ipk'           => 'required',
            'tahun_masuk'   => 'required',
            'tahun_keluar'  => 'required',
            'alamat'        => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = PendidikanKaryawanModel::firstOrNew([
            'id'               => $request->id !== 'undefined' ? $request->id : (PendidikanKaryawanModel::latest()->first()->id ?? PendidikanKaryawanModel::first()->id ?? 0) + 1,
            'data_karyawan_id' => $request->id_update
        ]);

        $save->nama     = $request->nama;
        $save->jurusan  = $request->jurusan;
        $save->IPK      = $request->ipk;
        $save->alamat   = $request->alamat;
        $save->tahun_masuk  = $request->tahun_masuk;
        $save->tahun_keluar = $request->tahun_keluar;
        if ($request->sertifikat) {
            $file = $request->file('sertifikat');

            $path = public_path('karywan/keluarga/pendidikan/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karywan/keluarga/pendidikan/sertifikat/') . "/" . $imageName;
        }

        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_pelatihan(Request $request)
    {
        $validasi = [
            'nama'          => 'required',
            'periode'       => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = PelatihanKaryawanModel::firstOrNew([
            'id'               => $request->id !== 'undefined' ? $request->id : (PelatihanKaryawanModel::latest()->first()->id ?? PelatihanKaryawanModel::first()->id ?? 0) + 1,
            'data_karyawan_id' => $request->id_update
        ]);

        $save->nama     = $request->nama;
        $save->periode  = $request->periode;
        if ($request->sertifikat) {
            $file = $request->file('sertifikat');

            $path = public_path('karywan/keluarga/pelatihan/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karywan/keluarga/pelatihan/sertifikat/') . "/" . $imageName;
        }

        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_riwayat(Request $request)
    {
        $validasi = [
            'nama'      => 'required',
            'alamat'    => 'required',
            'jabatan'   => 'required',
            'masuk'     => 'required',
            'keluar'    => 'required',
            'deskripsi' => 'required',
            'alasan'    => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = RiwayatKaryawanModel::firstOrNew([
            'id'               => $request->id !== 'undefined' ? $request->id : (RiwayatKaryawanModel::latest()->first()->id ?? RiwayatKaryawanModel::first()->id ?? 0) + 1,
            'data_karyawan_id' => $request->id_update
        ]);

        $save->nama       = $request->nama;
        $save->alamat     = $request->alamat;
        $save->jabatan    = $request->jabatan;
        $save->masuk      = $request->masuk;
        $save->keluar     = $request->keluar;
        $save->deskripsi  = $request->deskripsi;
        $save->alasan     = $request->alasan;
        if ($request->sertifikat) {
            $file = $request->file('sertifikat');

            $path = public_path('karywan/keluarga/riwayat_kerja/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karywan/keluarga/riwayat_kerja/sertifikat/') . "/" . $imageName;
        }

        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }

    public function simpan_karyawan_status(Request $request)
    {
        $save = DataKaryawanModel::firstOrNew([
            'id' => $request->id
        ]);

        $save->status = $request->status;
        $save->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $save
        ]);
    }
}
