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
        DataTables::of($this->models($request))
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
            'id'           => 'required',
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
            $update = [
                'username'          => $request->username,
                'name'              => $request->nama_lengkap,
                'cl_perusahaan_id'  => 1,
                'cl_user_group_id'  => 1,
                'status'            => 1,
                'update_date'       => Carbon::now(),
                'update_by'         => 'Administrator',
            ];

            $role = Role::whereName($request->role)->first();
            $user = User::findOrFail($id)->update($update);
            DB::table('model_has_roles')
            ->where('model_id', $id)
            ->update(['role_id' =>  $role->id]);
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
