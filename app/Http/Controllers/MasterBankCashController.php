<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
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

class MasterBankCashController extends Controller
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
        // dd(MasterBankCashModel::with(['coa_kas_saldo'])->first());
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
            return $row->coa_kas_saldo->uraian;
        })
        ->addColumn('jenis', function ($row){
            return $row->jenis_transaksi == 1 ? "Transfer" : "Cash";
        })
        ->addColumn('nominal_number', function ($row){
            return "Rp. ".number_format($row->nominal, 0);
        })
        ->rawColumns(['banks','nominal_number','jenis'])
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

        return view('master_bank_cash.create', $title);
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
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        // DB::beginTransaction();
        // try {
            $model = count(MasterBankCashModel::whereYear('created_at','=',Carbon::now()->format('Y'))->get()) + count(MasterReturnBankCashModel::whereYear('created_at','=',Carbon::now()->format('Y'))->get());
            $nomor = sprintf("%05s", $model + 1);
            $request['nomor_transaksi'] = $nomor.'/TRAN/KAS/'.Carbon::now()->format('Y');
            $request['nominal'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            MasterBankCashModel::create($request->except('_token'));

            $tahun = Carbon::now()->format('Y');
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

            $request['debet'] = $request->nominal;
            $request['kredit'] = $request->nominal;
            $request['sumber_data'] = 1;
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;
            $request['account_id'] = 7;
            $request['debet'] = $request->nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $request->bank_id;
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

        $detail = MasterBankCashModel::findOrFail($id)->first();

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

        $detail = MasterBankCashModel::with(['coa_kas_saldo'])->findOrFail($id);
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
        $validasi = [
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        DB::beginTransaction();
        try {
            $request['nominal'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            MasterBankCashModel::find($id)->update($request->except(['_token','_method']));

            // Edit Jurnal Umum, hapus detail
            $request['keterangan_jurnal_umum'] = $request->keterangan;
            $request['debet'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->nominal));
            $nomor = MasterJurnal::whereDokumen(MasterBankCashModel::whereId($id)->first()->nomor_transaksi)->first();
            $nomor->update($request->except(['_token','_method','account_id','keterangan_kas','akun_belanja','keterangan','nilai','total_nilai','attachment']));
            $nomor->fresh();
            JurnalUmumDetail::whereJurnalUmumId($nomor->id)->delete();

            $request['keterangan'] = '';
            $request['jurnal_umum_id'] = $nomor->id;
            $request['account_id'] = 7;
            $request['debet'] = $request->nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $request->bank_id;
            $request['debet'] = 0;
            $request['kredit'] = $request->nominal;
            JurnalUmumDetail::create($request->except('_token'));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

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
            MasterBankCashModel::findOrFail($id)->softdeletes();
            MasterJurnal::whereDokumen(MasterBankCashModel::whereId($id)->nomor_transaksi)->softdeletes();
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
        return MasterBankCashModel::with(['coa_kas_saldo'])
        ->when($request->cari, function($q) use($request){
            $q->where('nomor_transaksi', 'like','%'.$request->cari."%")
            ->orWhereHas('banks', function($q) use($request){
                $q->where('nama','%'.$request->cari."%");
            })
            ->orWhere('jenis_transaksi', 'like','%'.$request->cari."%")
            ->orWhere('nilai', 'like','%'.$request->cari."%")
            ->orWhere('keterangan', 'like','%'.$request->cari."%");
        })
        ->orderBy('id','desc')
        ->get();
    }

    public function softdelete_kas_isi_saldo(Request $request){
        DB::beginTransaction();
        try {
            MasterJurnal::whereDokumen(MasterBankCashModel::whereId($request->id)->first()->nomor_transaksi)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan
            ]);

            MasterBankCashModel::findOrFail($request->id)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan
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
