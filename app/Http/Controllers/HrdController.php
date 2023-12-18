<?php

namespace App\Http\Controllers;

use App\Models\TblDataKaryawan;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
        $this->middleware('permission:HRD');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('hrd.index', $title);
    }

    function get_datatable(Request $request){
        return DataTables::of($this->models($request))
        ->addColumn('divisis', function ($row){
            return $row->divisis->nama;
        })
        ->addColumn('gaji', function ($row){
            return $row->gaji->gaji;
        })
        ->addColumn('tanggal_masuk', function ($row){
            return Carbon::parse($row->created_at)->format('d-m-Y');
        })
        ->rawColumns(['divisis','gaji','tanggal_masuk'])

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

        $detail = UserPublicModel::findOrFail($id)->first();

        return view('users.detail', $title, compact(['detail']));
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

        $detail = UserPublicModel::findOrFail($id);

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
        return TblDataKaryawan::with(['divisis','gaji'])
        ->when($request->cari, function($q) use($request){
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
}
