<?php

namespace App\Http\Controllers;

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
        ->addColumn('kredits', function ($row){
            return $row->details->sum('kredit');
        })
        ->addColumn('debets', function ($row){
            return $row->details->sum('debet');
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
            'account_id'        => 'required',
            'debet'             => 'required',
            'kredit'            => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        dd($request->all(), MasterJurnal::first());
        $request['bank_id'] = $request->account_id;
        MasterJurnal::create($request->except('_token'));

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

        $detail = MasterJurnal::with(['jurnal_banks','details.coa_jurnal','jurnal_file'])->findOrFail($id);
        // dd($detail);

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
        return MasterJurnal::with(['details','jurnal_banks','jurnal_file'])->get();
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
