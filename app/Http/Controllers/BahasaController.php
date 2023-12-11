<?php

namespace App\Http\Controllers;

use App\Models\BahasaModel;
use App\Models\MasterCoaModel;
use App\Models\RequestPencarianDanaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BahasaController extends Controller
{
    private $title = 'Data Users';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:Users Public');
        // dd(DB::connection('pgsql2')->table('user'));
    }

    public function index(){
        // dd(MasterCoaModel::query()->first());

        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('bahasa.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return
        DataTables::of(
            $this->models($request)
        )->addColumn('actions', function ($row){
            $actionBtn ='
                <button href="'.route('users.edit', $row->id).'" class="btn btn-warning btn-sm button" onclick="modal_crud(`ubah`, '.$row->id.',`'.$row->nama.'`)" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                    Ubah
                </button>
                <a href="#" type="button" onclick="alert_delete('.$row->id.',`'.$row->name.'`)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger btn-sm buttonDestroy">
                    Hapus
                </a>
                ';
            return $actionBtn;
        })
        ->rawColumns(['actions'])

        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validasi = [
            'nama'     => 'required',
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
            $input = $request->input();
            $input['id'] = BahasaModel::orderBy('id','desc')->first()->id+1;
            BahasaModel::insert($input);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = User::findOrFail($id)->first();

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

        $detail = User::findOrFail($id);

        return view('users.edit', $title, compact(['detail']));
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
            'id'   => 'required',
            'nama' => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        $data = 'Data Tidak Tersimpan';
        DB::beginTransaction();
        try{
            $data = BahasaModel::findOrFail($request->id)->update([
                'nama' => $request->nama,
            ]);

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $data
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
            'message' => BahasaModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return BahasaModel::query()->where('isAktif',1)->get();
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
