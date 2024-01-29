<?php

namespace App\Http\Controllers;

use App\Models\MasterCoaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class MasterCoaController extends Controller
{
    private $title = 'Master Rekening Bank';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:'.Permission::whereId(10)->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_coa.index', $title);
    }

    function get_datatable(Request $request){
        return DataTables::of($this->models($request))
        ->addColumn('rekening', function ($row){
            return $row->kdrek1.$row->kdrek2.$row->kdrek3.$row->kdrek;
        })
        ->rawColumns(['rekening'])
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

        return view('master_coa.create', $title);
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
            'pilih_data_id' => 'required',
            'kode_coa'      => 'required',
            'nama_akun'     => 'required',
            'rekening_bank' => 'required',
            'nama_bank'     => 'required',
        ];

        if ($request->pilih_data_id == 2) $validasi += ['kdrek1_coa_id'];
        if ($request->pilih_data_id == 3) $validasi += ['kdrek2_coa_id'];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        $input = $request->except(['_token','kode_coa','nama_akun','kdrek1_coa_id','kdrek2_coa_id','kdrek3_coa_id']);
        $input['id']            = MasterCoaModel::getMaxIdRecord()->first()->id+1;
        $input['kdrek1']        = 0;
        $input['kdrek2']        = 0;
        $input['kdrek3']        = 0;

        if ($request->pilih_data_id > 1) $input['kdrek1'] = $request->kdrek1_coa_id;
        if ($request->pilih_data_id > 2) $input['kdrek2'] = $request->kdrek2_coa_id;
        if ($request->pilih_data_id > 3) $input['kdrek3'] = $request->kdrek3_coa_id;

        $input['kdrek']         = $request->kode_coa;
        $input['type']          = $request->pilih_data_id < 4 ? "H" : "D";
        $input['uraian']        = $request->nama_akun;
        $input['rekening_bank'] = $request->rekening_bank;
        $input['nama_bank']     = $request->nama_bank;

        MasterCoaModel::insert($input);

        return redirect('master_coa');
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

        $detail = MasterCoaModel::findOrFail($id)->first();

        return view('master_coa.detail', $title, compact(['detail']));
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

        $detail = MasterCoaModel::findOrFail($id);
        $kdrek1 = MasterCoaModel::where('kdrek1',$detail->kdrek1)->first();
        $kdrek2 = MasterCoaModel::where('kdrek2',$detail->kdrek2)->first();
        $kdrek3 = MasterCoaModel::where('kdrek3',$detail->kdrek3)->first();

        return view('master_coa.edit', $title, compact(['detail', 'kdrek1', 'kdrek2', 'kdrek3']));
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
            'uraian'        => 'required',
            'rekening_bank' => 'required',
            'alamat_bank'   => 'required',
            'nama_bank'     => 'required',
            'account_name'  => 'required',
            'swift_code'    => 'required',
        ]);

        // Store your file into directory and db
        $update = [
            'kdrek1'        => 1,
            'kdrek2'        => 1,
            'kdrek3'        => 1,
            'kdrek'         => 1,
            'type'          => "H",
            'uraian'        => $request->uraian,
            'rekening_bank' => $request->rekening_bank,
            'alamat_bank'   => $request->alamat_bank,
            'nama_bank'     => $request->nama_bank,
            'account_name'  => $request->account_name,
            'swift_code'    => $request->swift_code,
        ];
        MasterCoaModel::find($id)->update($update);

        return redirect('master_coa');
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
            'message' => MasterCoaModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return MasterCoaModel::query()
        ->when($request->cari, function($q) use($request){
            $q->where('uraian', 'ilike','%'.$request->cari."%")
            ->orWhere('type', 'ilike','%'.$request->cari."%")
            ->orWhere('metode_penyusutan', 'ilike','%'.$request->cari."%")
            ->orWhere('rekening_bank', 'ilike','%'.$request->cari."%")
            ->orWhere('alamat_bank', 'ilike','%'.$request->cari."%")
            ->orWhere('nama_bank', 'ilike','%'.$request->cari."%")
            ->orWhere('account_name', 'ilike','%'.$request->cari."%")
            ->orWhere('swift_code', 'ilike','%'.$request->cari."%");
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
}
