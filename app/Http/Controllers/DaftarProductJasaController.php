<?php

namespace App\Http\Controllers;

use App\Models\DaftarPricingModel;
use App\Models\JasaModel;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DaftarProductJasaController extends Controller
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
        // dd(JasaModel::with('status')->get());
        //  $this->middleware('permission:Users Public');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('daftar_product_jasa.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return DataTables::of($this->models($request))
        ->addColumn('UserPosting', function ($row){
            return $row->user->name;
        })
        ->addColumn('kategori', function ($row){
            return $row->kategori->nama;
        })
        ->addColumn('subKategori', function ($row){
            return $row->subKategori->nama;
        })
        ->rawColumns(['UserPosting','kategori','subKategori'])
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

        $detail = JasaModel::findOrFail($id)->first();

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

        $detail = JasaModel::whereId($id)->with('productDoc','user','kategori','subKategori','status')->first();
        return view('daftar_product_jasa.edit', $title, compact(['detail']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = 'Data Tidak Tersimpan';
        DB::beginTransaction();
        try{
            // Store your file into directory and db
            $update = [
                "msStatusJasaId" => $request->verifikasi_jasa,
                "isPengambilan" => $request->pengambilan,
                "isPengiriman" => $request->pengiriman,
                "isUnggulan" => $request->unggulan,
                "keterangan" => $request->keterangan,
            ];

            $user = JasaModel::whereId($id)->update($update);
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
        return JasaModel::with('productDoc','user')
        ->when($request->cari, function($q) use($request){
            $q->where('Jasa.nama', 'ilike', '%'.$request->cari.'%');
        })
        ->get();

        // ->select('Jasa.*', 'User.name as UserPosting', 'MsKategori.nama as kategori', 'MsSubkategori.nama as subkategori', 'MsStatusJasa.nama as statusjasa', DB::raw('to_char("Jasa"."createdAt", \'DD-MM-YYYY\') AS tanggal_posting'))
        // ->leftJoin('User', 'User.id', '=', 'Jasa.userId')
        // ->leftJoin('MsKategori', 'MsKategori.id', '=', 'Jasa.msKategoriId')
        // ->leftJoin('MsSubkategori', 'MsSubkategori.id', '=', 'Jasa.msSubkategoriId')
        // ->leftJoin('MsStatusJasa', 'MsStatusJasa.id', '=', 'Jasa.msStatusJasaId')

    }

    function verifikasi_jasa(Request $request){
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => JasaModel::findOrFail($request->id)->update([
                'msStatusJasaId' => 1
            ])
        ]);
    }

    public function daftar_pricing(Request $request){
        return DataTables::of(
            DaftarPricingModel::with('jasas.productDoc')
            ->when($request->cari, function($q) use($request){
                $q->where('Jasa.nama', 'ilike', '%'.$request->cari.'%');
            })
            ->where('jasaId',$request->id)
            ->get()
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
