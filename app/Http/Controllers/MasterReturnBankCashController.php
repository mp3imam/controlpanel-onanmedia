<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterJurnal;
use App\Models\MasterReturnBankCashModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class MasterReturnBankCashController extends Controller
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
        $this->middleware('permission:'.Permission::whereId(11)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_bank_cash.index', $title);
    }

    function get_datatable(Request $request){
        return
        DataTables::of($this->models($request))
        ->addColumn('banks', function ($row){
            return $row->banks->nama;
        })
        ->addColumn('jenis', function ($row){
            return $row->jenis_transaksi ? "Transfer" : "Cash";
        })
        ->rawColumns(['banks','jenis'])
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

        return view('master_return_bank_cash.create', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request->all());
        $validasi = [
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'tujuan_id'         => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        $model = MasterReturnBankCashModel::latest()->whereYear('created_at','=',Carbon::now()->format('Y'))->first();
        $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
        $request['nomor_transaksi'] = $nomor.'/TRAN/KAS/'.Carbon::now()->format('Y');
        $request['nominal'] = str_replace(",","",$request->nominal);
        // DB::beginTransaction();
        // try {
        //     //code...

            MasterReturnBankCashModel::create($request->except('_token'));
            $tahun = Carbon::now()->format('Y');
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_jurnal_umum'] = $request->keterangan_kas ?? '-';

            $request['kredit'] = $request->nominal;
            $request['debet'] = $request->nominal;
            $masterJurnal = MasterJurnal::create($request->except('_token'));

            $request['jurnal_umum_id'] = $masterJurnal->id;
            $request['account_id'] = $request->bank_id;
            $request['debet'] = $request->nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $request->tujuan_id;
            $request['debet'] = 0;
            $request['kredit'] = $request->nominal;
            JurnalUmumDetail::create($request->except('_token'));

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     DB::rollBack();
        // }

        return redirect('master_bank_cash');
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

        $detail = MasterReturnBankCashModel::findOrFail($id)->first();

        return view('master_bank_cash.detail', $title, compact(['detail']));
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

        $detail = MasterReturnBankCashModel::with(['banks'])->findOrFail($id);
        // dd($detail);

        return view('master_bank_cash.edit', $title, compact(['detail']));
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
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'nilai'             => 'required',
        ]);

        // Store your file into directory and db
        MasterReturnBankCashModel::find($id)->update($request->except(['_token','_method']));

        return redirect('master_bank_cash');
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
            MasterReturnBankCashModel::findOrFail($id)->softDeletes();
            MasterJurnal::whereDokumen(MasterReturnBankCashModel::whereId($id)->nomor_transaksi)->softdeletes();
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

    public function models($request){
        return MasterReturnBankCashModel::with(['banks'])
        ->when($request->cari, function($q) use($request){
            $q->where('nomor_transaksi', 'like','%'.$request->cari."%")
            // ->orWhere('tanggal_transaksi', $request->cari)
            ->orWhereHas('banks', function($q) use($request){
                $q->where('nama','%'.$request->cari."%");
            })
            ->orWhere('jenis_transaksi', 'like','%'.$request->cari."%")
            // ->orWhereHa', function($q) use($request){
            //     $q->where('name','%'.$request->cari."%");
            // })
            ->orWhere('nilai', 'like','%'.$request->cari."%")
            ->orWhere('keterangan', 'like','%'.$request->cari."%");
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
