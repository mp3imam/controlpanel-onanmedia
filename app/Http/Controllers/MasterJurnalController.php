<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterJurnal;
use App\Models\TemporaryFileUploadJurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class MasterJurnalController extends Controller
{
    private $title = 'Master Jurnal Umum';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(MasterJurnal::with(['details','jurnal_banks','jurnal_file'])->get());
        $this->middleware('permission:'.Permission::whereId(13)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_jurnal.index', $title);
    }

    function get_datatable(Request $request){
        return
        DataTables::of($this->models($request))
        // ->addColumn('banks', function ($row){
        //     return $row->jurnal_banks->nama;
        // })
        ->addColumn('debets', function ($row){
            return "Rp. ".number_format($row->debet, 0);
        })
        ->addColumn('kredits', function ($row){
            return "Rp. ".number_format($row->kredit, 0);
        })
        ->rawColumns(['banks','kredit','debet'])
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

        return view('master_jurnal.create', $title);
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
            'account_id'        => 'nullable',
            'debet'             => 'nullable',
            'kredit'            => 'nullable',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        DB::beginTransaction();
        try {
            // Store your file into directory and db
            $tahun = Carbon::now()->format('Y');
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id+1 : 1);
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['dokumen'] = $request->nomor_transaksi;
            $request['debet'] = str_replace(".","",str_replace("Rp. ","",$request->total_debet));
            $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->total_kredit));
            $request['jenis'] = 0;
            $jurnaUmum = MasterJurnal::create($request->except('_token'));

            $request['jurnal_umum_id'] = $jurnaUmum->id;
            foreach ($request->akun_belanja as $akun => $a) {
                $request['debet'] = str_replace(".","",str_replace("Rp. ","",$request->debet_detail[$akun]));
                $request['kredit'] = str_replace(".","",str_replace("Rp. ","",$request->kredit_detail[$akun]));
                $request['keterangan'] = $request->keterangan[$akun] ?? '';
                $request['account_id'] = $a;

                JurnalUmumDetail::create($request->except('_token'));
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect('master_jurnal');
    }

    public function softdelete_kas_belanja(Request $request){
        DB::beginTransaction();
        try {
            MasterJurnal::findOrFail($request->id)->update([
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

    public function upload_foto(Request $request){
        foreach ($request->file('attachment') as $file) {
            $path = public_path('jurnal_umum/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);

            TemporaryFileUploadJurnal::create([
                'folder' => $path,
                'filename' => $imageName,
                'token' => $request->header('X-Csrf-Token'),
                'created_by' => (int)Auth::user()->id
            ]);
        }
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

        $detail = MasterJurnal::findOrFail($id)->first();

        return view('master_jurnal.detail', $title, compact(['detail']));
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

        $detail = MasterJurnal::with(['coa_jurnal_umum','details.coa_jurnal','jurnal_file'])->findOrFail($id);

        return view('master_jurnal.edit', $title, compact(['detail']));
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
        MasterJurnal::find($id)->update($request->except(['_token','_method']));

        return redirect('master_jurnal');
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
            'message' => MasterJurnal::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return MasterJurnal::with(['details','coa_jurnal_umum','jurnal_file'])->get();
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
