<?php

namespace App\Http\Controllers;

use App\Models\DaftarTenderModel;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DaftarTenderController extends Controller
{
    private $title = 'Data Tender';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Daftar Tender');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('daftar_tender.index', $title);
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
        )
        ->addColumn('namaUser', function ($row){
            return $row->user->name ?? '';
        })
        ->addColumn('statusTender', function ($row){
            return $row->status->nama ?? '';
        })
        ->addColumn('tanggal_posting', function ($row){
            return Carbon::parse($row->createdAt);
        })
        ->rawColumns(['tanggal_posting'])
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
            'username'     => 'required',
            'nama_lengkap' => 'required',
            'role'         => 'required',
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
            $input = $request->only(['username','nama_lengkap']);
            $input['id']               = User::select('id')->orderBy('id','desc')->first()->id +1;
            $input['cl_perusahaan_id'] = 1;
            $input['cl_user_group_id'] = 1;
            $input['status']           = 1;
            $input['update_date']      = Carbon::now();
            $input['update_by']        = 'Administrator';
            $input['password']         = Hash::make('12345678');
            User::insert($input);

            $role = Role::whereName($request->role)->first();
            $user = User::whereId($input['id'])->first();

            $user->assignRole($role);
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

        $detail = DaftarTenderModel::whereId($id)->first();

        return view('daftar_tender.detail', $title, compact(['detail']));
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

        $detail = DaftarTenderModel::whereId($id)->first();

        return view('daftar_tender.edit', $title, compact(['detail']));
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
            'detail_id'         => 'required',
            'verifikasi_tender' => 'required',
        ];

        if ($request->verifikasi_tender == 3 || $request->verifikasi_tender == 4 || $request->verifikasi_tender == 5)
        $validasi += ['keterangan' => 'required'];

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
            $update = ['msStatusTenderId'  => $request->verifikasi_tender];
            if ($request->verifikasi_tender == 3 || $request->verifikasi_tender == 4 || $request->verifikasi_tender == 5)
            $update += ['keterangan' => $request->keterangan];

            $user = DaftarTenderModel::whereId($id)->update($update);
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
        return
        // DaftarTenderModel::query()
        // ->select('Tender.*', 'User.name as namaUser','MsStatusTender.nama as statusTender','User.image as profileUser')
        // ->leftJoin('User','User.id','=','Tender.userId')
        // ->leftJoin('MsStatusTender','MsStatusTender.id','=','Tender.msStatusTenderId')
        // // ->where('userId',$request->id)
        // ->get();

        DaftarTenderModel::with('user','status')->get();
    }

    public function daftar_pricing(Request $request){
        return DataTables::of(
            DaftarTenderModel::query()
            ->select('Tender.*', 'Jasa.nama as UserPosting')
            ->leftJoin('User','User.id','=','JasaPricing.userId')
            ->where('userId',$request->id)->get()
            )->make(true);
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
