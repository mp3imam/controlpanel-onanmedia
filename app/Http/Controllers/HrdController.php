<?php

namespace App\Http\Controllers;

use App\Helpers\IdStringRandom;
use App\Models\DataKaryawanModel;
use App\Models\DataKaryawanPekerjaanModel;
use App\Models\DataKaryawanPersonalModel;
use App\Models\KeluargaKaryawanModel;
use App\Models\PelatihanKaryawanModel;
use App\Models\PendidikanKaryawanModel;
use App\Models\RiwayatKaryawanModel;
use App\Models\User;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
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
            KeluargaKaryawanModel::whereDataKaryawanId($request->karyawanId)->with(['agama_keluarga'])
                ->when($request->cari, function ($q) use ($request) {
                    $q->where('nama', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('pekerjaan', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('no_hp', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('alamat', 'ilike', '%' . $request->cari . '%');
                })->get()
        )
            ->addColumn('usia', function ($row) {
                return Carbon::parse($row->tgl_lahir)->diffInYears(Carbon::now()) . " Tahun";
            })
            ->addColumn('tanggal_lahir', function ($row) {
                return Carbon::parse($row->tanggal_lahir)->format('d-m-Y');
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
            PendidikanKaryawanModel::whereDataKaryawanId($request->karyawanId)
                ->when($request->cari, function ($q) use ($request) {
                    $q->where('nama', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('jurusan', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('IPK', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('alamat', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('tahun_masuk', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('tahun_keluar', 'ilike', '%' . $request->cari . '%');
                })->get()
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
            PelatihanKaryawanModel::whereDataKaryawanId($request->karyawanId)
                ->when($request->cari, function ($q) use ($request) {
                    $q->where('nama', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('periode', 'ilike', '%' . $request->cari . '%');
                })->get()
        )
            ->make(true);
    }

    function tabel_karyawan_riwayat(Request $request)
    {
        return DataTables::of(
            RiwayatKaryawanModel::whereDataKaryawanId($request->karyawanId)
                ->when($request->cari, function ($q) use ($request) {
                    $q->where('nama', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('deskripsi', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('alamat', 'ilike', '%' . $request->cari . '%')
                        ->orWhere('alasan', 'ilike', '%' . $request->cari . '%');
                })
                ->get()
        )
            ->addColumn('tanggal_masuk', function ($row) {
                return Carbon::parse($row->masuk)->format('d-m-Y');
            })
            ->addColumn('tanggal_keluar', function ($row) {
                return Carbon::parse($row->keluar)->format('d-m-Y');
            })
            ->rawColumns(['tanggal_masuk', 'tanggal_keluar'])
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

        $detail = DataKaryawanModel::with(['agama_personal', 'pendidikan_terakhir_banget', 'pekerjaan.departement', 'personal', 'user'])->whereId($id)->first();
        $sisa_tahun = 0;
        $sisa_bulan = 3;
        $sisa_hari = 0;

        if ($detail->pekerjaan) {
            $selisih = (new DateTime($detail->pekerjaan->kontrak_selesai))->diff(new DateTime);

            $sisa_tahun = $selisih->y;
            $sisa_bulan = $selisih->m;
            $sisa_hari = $selisih->d;
        }

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
                $q->where('nama_lengkap', 'like', '%' . $request->cari . '%')
                    ->orWhere('email', 'like', '%' . $request->cari . '%')
                    ->orWhere('no_handphone', 'like', '%' . $request->cari . '%');
                // ->orWhere('pekerjaan.departement', function ($q) use ($request) {
                //     $q->where('nama', 'like', '%' . $request->cari . '%');
                // });
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
            'username_umum'         => 'required',
            'nama_lengkap_umum'     => 'required',
            'nama_panggilan_umum'   => 'required',
            'alamat_ktp_umum'       => 'required',
            'alamat_domisili_umum'  => 'required',
            'tempat_lahir_umum'     => 'required',
            'tanggal_lahir_umum'    => 'required',
            'no_hp_umum'            => 'required',
            'pendidikan_id_umum'    => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $save = "Tidak Tersimpan";
        DB::beginTransaction();
        try {
            // Jika ada file foto diunggah, proses file dan atur atribut foto
            $imageName = null;
            if ($request->hasFile('foto_umum')) {
                $file = $request->file('foto_umum');
                $imageName = Carbon::now()->format('H:i:s') . '_' . uniqid() . '.' . $file->extension();
                $path = public_path('karyawan/foto/');
                $file->move($path, $imageName);
            }

            // Buat atau update pengguna berdasarkan ID yang diberikan
            if ($request->id_update !== null) {
                User::whereId(DataKaryawanModel::where('id', $request->id_update)->first()->userId)->update(
                    [
                        'username' => $request->username_umum,
                        'nama_lengkap' => $request->nama_lengkap_umum,
                        'foto' => $imageName !== null ? asset('karyawan/foto/') . '/' . $imageName : null
                    ]
                );
            } else {
                User::insert([
                    'id'                => User::orderByRaw('id::int DESC')->first()->id + 1,
                    'username'          => $request->username_umum,
                    'password'          => Hash::make($request->tanggal_lahir_umum),
                    'cl_user_group_id'  => 1,
                    'nama_lengkap'      => $request->nama_lengkap_umum,
                    'status'            => 1,
                    'cl_perusahaan_id'  => 1,
                    'update_date'       => Carbon::now()->format('Y-m-d'),
                    'update_by'         => 'administrator',
                    'foto'              => $imageName !== null ? asset('karyawan/foto/') . '/' . $imageName : null
                ]);

                $user = User::orderByRaw('id::int DESC')->first();

                $userRole = Role::whereName('web_developer')->first();
                $user->assignRole($userRole);
            }

            // Simpan Data Karyawan
            $save = DataKaryawanModel::updateOrCreate(
                ['id' => $request->id_update !== null ? $request->id_update : DataKaryawanModel::orderby('id', 'desc')->first()->id + 1],
                [
                    'nama_lengkap' => $request->nama_lengkap_umum,
                    'tanggal_lahir' => $request->tanggal_lahir_umum,
                    'nama_panggilan' => $request->nama_panggilan_umum,
                    'nik_khusus' => $request->nik_khusus_umum ?? '',
                    'alamat_ktp' => $request->alamat_ktp_umum,
                    'alamat_domisili' => $request->alamat_domisili_umum,
                    'agama_id' => $request->agama_id_umum,
                    'tempat_lahir' => $request->tempat_lahir_umum,
                    'jenis_kelamin' => $request->jenis_kelamin_umum,
                    'no_handphone' => $request->no_hp_umum,
                    'email' => $request->email_umum ?? '',
                    'userId' => $request->id_update !== null ? $request->id_update : User::orderByRaw('id::int DESC')->first()->id,
                    'pendidikan_terakhir' => $request->pendidikan_id_umum,
                    'foto' => $request->foto_umum !== null ? asset('karyawan/foto/') . "/" . $imageName : null
                ]
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $user = $e->getMessage();

            return response()->json([
                'status'  => Response::HTTP_TOO_MANY_REQUESTS,
                'message' => $save
            ]);
        }
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

            $path = public_path('karyawan/keluarga/personal/ktp/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->foto_ktp         = asset('karyawan/keluarga/personal/ktp/') . "/" . $imageName;
        }
        if ($request->no_kartu_keluarga) {
            $file = $request->file('no_kartu_keluarga');

            $path = public_path('karyawan/keluarga/personal/kk/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->foto_kk         = asset('karyawan/keluarga/personal/kk/') . "/" . $imageName;
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
        // dd($request->all());
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
        if ($request->status_kontrak == 2) {
            $save->tanggal_masuk  = Carbon::now()->format('Y-m-d');
            $save->periode_kontrak  = '-';
            $save->kontrak_selesai = Carbon::now()->addYears(30)->format('Y-m-d');
        } else {
            $save->tanggal_masuk  = Carbon::parse($request->kontrak_masuk)->format('Y-m-d');
            $save->periode_kontrak  = $request->periode_kontrak;
            $save->kontrak_selesai = Carbon::parse($request->kontrak_selesai)->format('Y-m-d');
        }
        $save->cost_center_id = 0;
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
            'no_hp'         => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
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

            $path = public_path('karyawan/keluarga/pendidikan/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karyawan/keluarga/pendidikan/sertifikat/') . "/" . $imageName;
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

            $path = public_path('karyawan/keluarga/pelatihan/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karyawan/keluarga/pelatihan/sertifikat/') . "/" . $imageName;
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

            $path = public_path('karyawan/keluarga/riwayat_kerja/sertifikat/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);
            $save->sertifikat = asset('karyawan/keluarga/riwayat_kerja/sertifikat/') . "/" . $imageName;
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