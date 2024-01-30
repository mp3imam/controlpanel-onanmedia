<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterJurnal;
use App\Models\MasterJurnalFile;
use App\Models\MasterKasBelanja;
use App\Models\MasterKasBelanjaDetail;
use App\Models\MasterKasBelanjaFile;
use App\Models\TemporaryFileUpload;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class MasterKasBelanjaController extends Controller
{
    private $title = 'Form Isian Transaksi Belanja';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:'.Permission::findOrFail(12)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;
        $user = Auth::user();
        $finance = $user->hasRole('finance');

        $all = count(MasterKasBelanja::when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $create = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_CREATE)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $on_progress = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_ON_PROGRESS)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $prosess = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_PROSESS)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $tolak = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_TOLAK)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $histori = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_HISTORY)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());
        $pending = count(MasterKasBelanja::whereStatus(MasterKasBelanja::STATUS_PENDING)
        ->when(!$finance, function($q) use($user){
            $q->whereUserId($user->id);
        })->get());

        return view('master_kas_belanja.index', $title, compact(['all', 'create']));
    }

    function get_datatable(Request $request){
        $user = Auth::user();
        return
        DataTables::of($this->models($request))
        ->addColumn('banks', function ($row){
            return $row->coa_belanja->uraian;
        })
        ->addColumn('username', function ($row) use($user){
            return $user->username;
        })
        ->addColumn('role', function ($row) use($user){
            return $user->roles[0]->name;
        })
        ->addColumn('nominals', function ($row){
            return "Rp. ".number_format($row->nominal, 0);
        })
        ->addColumn('jenis_transaksi', function ($row){
            return $row->jenis == 1 ? "Transfer" : "Cash";
        })
        ->addColumn('tanggal', function ($row){
            return Carbon::parse($row->tanggal_transaksi)->format('d-m-Y');
        })
        ->rawColumns(['banks','nominals','jenis_transaksi'])
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_kas_belanja.create', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validasi = [
            'tanggal_transaksi' => 'required',
            'account_id'        => 'required',
            'jenis'             => 'required',
            'nilai'             => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->messages());

        DB::beginTransaction();
        try {
            $tahun = Carbon::now()->format('Y');
            $model = MasterKasBelanja::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['nomor_transaksi'] = $nomor.'/TRAN/BLJ/'.$tahun;
            $request['nominal'] = str_replace(".","",str_replace("Rp. ","",$request->total_nilai));
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';
            $request['user_id'] = Auth::user()->id;

            // Store your file into directory and db
            $kas = MasterKasBelanja::create($request->except('_token'));

            foreach ($request->akun_belanja as $akun => $a) {
                $nominal = str_replace(".","",str_replace("Rp. ","",$request->nilai[$akun]));

                $data = [
                    'kas_id'     => $kas->id,
                    'account_id' => $a,
                    'keterangan' => $request->keterangan[$akun] ?? '',
                    'nominal'    => $nominal,
                ];
                MasterKasBelanjaDetail::create($data);
            }

            if ($request->attachment){
                $files = TemporaryFileUpload::query()
                ->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
                ->whereStatus("0")
                ->whereCreatedBy(Auth::user()->id)
                ->whereToken($request->_token)
                ->get();

                foreach ($files as $file) {
                    $data = [
                        'kas_id'     => $kas->id,
                        'filename'   => $file->filename,
                    ];
                    MasterKasBelanjaFile::create($data);

                    // update foto status menjadi 1
                    TemporaryFileUpload::findOrFail($file->id)->update([
                        'kas_id' => $kas->id,
                        'status' => 1,
                    ]);
                }
            }

            // Create Master Jurnal
            $request['dokumen'] = $request->nomor_transaksi;
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_jurnal_umum'] = $request->keterangan_kas ?? '-';
            $request['bank_id'] = $request->account_id;
            $request['sumber_data'] = 3;
            $request['debet'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            $masterJurnal = MasterJurnal::create($request->except('_token'));

            // Create Master Jurnal Detail
            foreach ($request->akun_belanja as $akun => $a) {
                $nominal = str_replace(".","",str_replace("Rp. ","",$request->nilai[$akun]));

                $data = [
                    'jurnal_umum_id' => $masterJurnal->id,
                    'account_id'     => $a,
                    'keterangan'     => $request->keterangan[$akun] ?? '',
                    'debet'         => $nominal,
                ];
                JurnalUmumDetail::create($data);
            }
            JurnalUmumDetail::create([
                'jurnal_umum_id' => $masterJurnal->id,
                'account_id'     => $request->account_id,
                'keterangan'     => '',
                'kredit'          => $request->nominal,
            ]);

            //
            foreach (MasterKasBelanjaFile::whereKasId($kas->id)->get() as $file) {
                MasterJurnalFile::create([
                    'jurnal_umum_id' => $masterJurnal->id,
                    'path'           => 'kas_belanja',
                    'filename'       => $file->filename,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('master_kas_belanja');
    }

    public function upload_foto(Request $request){
        foreach ($request->file('attachment') as $file) {
            $path = public_path('kas_belanja/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);

            TemporaryFileUpload::create([
                'folder' => 'kas_belanja',
                'filename' => $imageName,
                'token' => $request->header('X-Csrf-Token'),
                'created_by' => (int)Auth::user()->id
            ]);
        }
    }

    public function softdelete_kas_belanja(Request $request){
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            MasterKasBelanja::findOrFail($request->id)->update([
                'deleted_at' => $date,
                'alasan' => $request->alasan
            ]);

            MasterJurnal::whereDokumen(MasterKasBelanja::withTrashed()->whereId($request->id)->first()->nomor_transaksi)->update([
                'deleted_at' => $date,
                'alasan' => $request->alasan,
                'keterangan_jurnal_umum' => $request->alasan,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = MasterKasBelanja::with(['coa_belanja','belanja_detail.coa_belanja','banks_belanja','kas_file'])->findOrFail($id);
        // dd($detail);

        return view('master_kas_belanja.edit', $title, compact(['detail']));
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
            'tanggal_transaksi' => 'required',
            'account_id'        => 'required',
            'jenis'             => 'required',
            'nilai'             => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->messages());

        DB::beginTransaction();
        try {
            // Store your file into directory and db
            $request['nominal'] = str_replace(".","",str_replace("Rp. ","",$request->total_nilai));
            MasterKasBelanja::find($id)->update($request->except(['_token','_method']));

            MasterKasBelanjaDetail::whereKasId($id)->delete();

            // Create New Detail and File Kas Belanja
            foreach ($request->akun_belanja as $akun => $a) {
                $nominal = str_replace(".","",str_replace("Rp. ","",$request->nilai[$akun]));

                $data = [
                    'kas_id'     => $id,
                    'account_id' => $a,
                    'keterangan' => $request->keterangan[$akun] ?? '',
                    'nominal'    => $nominal,
                ];
                MasterKasBelanjaDetail::create($data);
            }

            $files = TemporaryFileUpload::query()
            ->whereStatus("0")
            ->get();

            foreach ($files as $file) {
                $data = [
                    'kas_id'     => $id,
                    'filename'   => $file->filename,
                ];
                MasterKasBelanjaFile::create($data);

                // update foto status menjadi 1
                TemporaryFileUpload::findOrFail($file->id)->update([
                    'kas_id' => $id,
                    'status' => 1,
                ]);

            }

            // Edit Jurnal Umum, hapus detail dan file Jurnal Umum
            $request['keterangan_jurnal_umum'] = $request->keterangan_kas;
            $request['debet'] = str_replace(".","",str_replace("Rp. ","",$request->total_nilai));
            $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->total_nilai));
            $nomor = MasterJurnal::whereDokumen(MasterKasBelanja::whereId($id)->first()->nomor_transaksi)->first();
            $nomor->update($request->except(['_token','_method','account_id','keterangan_kas','akun_belanja','keterangan','nilai','total_nilai','attachment']));
            $nomor->fresh();
            JurnalUmumDetail::whereJurnalUmumId($nomor->id)->delete();
            MasterJurnalFile::whereJurnalUmumId($nomor->id)->delete();

            // Create Master Jurnal Detail
            foreach ($request->akun_belanja as $akun => $a) {
                $nominal = str_replace(".","",str_replace("Rp. ","",$request->nilai[$akun]));

                $data = [
                    'jurnal_umum_id' => $nomor->id,
                    'account_id'     => $a,
                    'keterangan'     => $request->keterangan[$akun] ?? '',
                    'debet'          => $nominal,
                ];
                JurnalUmumDetail::create($data);
            }
            JurnalUmumDetail::create([
                'jurnal_umum_id' => $nomor->id,
                'account_id'     => $request->account_id,
                'keterangan'     => '',
                'kredit'         => $request->nominal,
            ]);

            foreach (MasterKasBelanjaFile::whereKasId($id)->get() as $file) {
                MasterJurnalFile::create([
                    'jurnal_umum_id' => $nomor->id,
                    'path'           => 'kas_belanja',
                    'filename'       => $file->filename,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('master_kas_belanja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::beginTransaction();
        try {
            MasterKasBelanja::findOrFail($id)->delete();
            MasterJurnal::whereDokumen(MasterKasBelanja::whereId($id)->nomor_transaksi)->delete();
            DB::commit();
            $status = 'Success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $status = "Error $th";
        }
        return response()->json([
            'status'  => Response::HTTP_BAD_REQUEST,
            'message' => $status
        ]);
    }

    public function hapus_foto(Request $request){
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => MasterKasBelanjaFile::findOrFail($request->id)->delete()
        ]);
    }

    public function models($request){
        $user = Auth::user();
        return MasterKasBelanja::with(['coa_belanja','belanja_detail','banks_belanja'])
        ->when($request->cari, function($q) use($request){
            $q->where('nomor_transaksi', 'like','%'.$request->cari."%")
            ->orWhere('nominal', 'like','%'.$request->cari."%")
            ->orWhere('keterangan_kas', 'like','%'.$request->cari."%");
        })
        ->when($user->roles[0]->name !== 'finance', function ($q) use($user){
            $q->whereUserId($user->id);
        })
        ->when($request->sumber, function($q) use($request){
            $q->whereJenis($request->sumber);
        })
        ->when($request->tanggal, function($q) use($request){
            $tanggal = explode(" to ",$request->tanggal);
            $q->when(count($tanggal) == 1, function ($q) use($tanggal) {
                $q->where('tanggal_transaksi', Carbon::parse($tanggal[0])->format('Y-m-d'));
            });
            $q->when(count($tanggal) == 2, function ($q) use($tanggal) {
                $q->where('tanggal_transaksi', '>=',Carbon::parse($tanggal[0])->format('Y-m-d'))->where('tanggal_transaksi', '<=',Carbon::parse($tanggal[1])->format('Y-m-d'));
            });
        })
        ->orderBy('id','desc')
        ->get();
    }

    public function pdf(Request $request){
        $datas = $this->models($request);

        $pdf = Pdf::loadview('users.pdf',[
                'name'  => 'Data Master Bank Cash',
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-Master-Bank-Cash-PDF');
    }
}
