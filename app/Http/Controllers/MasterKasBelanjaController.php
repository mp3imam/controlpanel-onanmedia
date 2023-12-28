<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterJurnal;
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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class MasterKasBelanjaController extends Controller
{
    private $title = 'Master Transaksi Kas';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:'.Permission::whereId(12)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_kas_belanja.index', $title);
    }

    function get_datatable(Request $request){
        return
        DataTables::of($this->models($request))
        ->addColumn('banks', function ($row){
            return $row->coa_belanja->uraian;
        })
        ->addColumn('nominal', function ($row){
            // dd($row->belanja_detail);
            return number_format($row->belanja_detail->sum('nominal'), 0);
        })
        ->addColumn('jenis_transaksi', function ($row){
            return $row->jenis_transaksi ? "Transfer" : "Cash";
        })
        ->rawColumns(['banks'])
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
            // 'jenis_transaksi'   => 'required',
            'nilai'             => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->messages());

        DB::beginTransaction();
        try {
            $model = MasterKasBelanja::latest()->whereYear('created_at', '=', Carbon::now()->format('Y'))->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['nomor_transaksi'] = $nomor.'/TRAN/BLJ/'.Carbon::now()->format('Y');
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

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
                    TemporaryFileUpload::findOrFail($file->id)->update(['status' => 1]);
                }
            }

            // Create Master Jurnal
            $request['keterangan_jurnal_umum'] = $request->keterangan_kas ?? '-';
            $request['sumber_data'] = 1;
            $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->total_nilai));
            $masterJurnal = MasterJurnal::create($request->except('_token'));

            // Create Master Jurnal Detail
            foreach ($request->akun_belanja as $akun => $a) {
                $nominal = str_replace(".","",str_replace("Rp. ","",$request->nilai[$akun]));

                $data = [
                    'jurnal_umum_id' => $masterJurnal->id,
                    'account_id'     => $a,
                    'keterangan'     => $request->keterangan[$akun] ?? '',
                    'kredit'         => $nominal,
                ];
                JurnalUmumDetail::create($data);
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
            $path = public_path('jurnal_umum/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);

            TemporaryFileUpload::create([
                'folder' => $path,
                'filename' => $imageName,
                'token' => $request->header('X-Csrf-Token'),
                'created_by' => (int)Auth::user()->id
            ]);
        }
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

        $detail = MasterKasBelanja::with(['belanja_detail','kas_file'])->findOrFail($id);

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
        $request->validate([
            'nomor_transaksi'   => 'required',
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'nilai'             => 'required',
        ]);

        // Store your file into directory and db
        MasterKasBelanja::find($id)->update($request->except(['_token','_method']));

        return redirect('master_kas_belanja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return response()->json([
            'status'  => Response::HTTP_BAD_REQUEST,
            'message' => MasterKasBelanja::findOrFail($id)->delete()
        ]);
    }

    public function hapus_foto(Request $request){
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => MasterKasBelanjaFile::findOrFail($request->id)->delete()
        ]);
    }

    public function models($request){
        return MasterKasBelanja::with(['coa_belanja','belanja_detail'])
        ->when($request->cari, function($q) use($request){
            $q->where('nomor_transaksi', 'like','%'.$request->cari."%")
            ->orWhereHas('banks_belanja', function($q) use($request){
                $q->where('nama','%'.$request->cari."%");
            })
            ->orWhere('jenis_transaksi', 'like','%'.$request->cari."%")
            ->orWhere('nilai', 'like','%'.$request->cari."%")
            ->orWhere('keterangan', 'like','%'.$request->cari."%");
        })
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
