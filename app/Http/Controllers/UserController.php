<?php

namespace App\Http\Controllers;

use App\Helpers\IdStringRandom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPublicModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $title = 'Data Role Users';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:Users Panel');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('users.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return
        DataTables::of($this->models($request))
        ->addColumn('role', function ($row){
            return $row->roles[0]->name;
        })
        ->addColumn('action', function ($row){
            $actionBtn ='
                <button href="'.route('users.edit', $row->id).'" class="btn btn-warning btn-sm button" onclick="modal_crud(`ubah`, '.$row->id.',`'.$row->username.'`,`'.$row->nama_lengkap.'`,`'.$row->roles[0]->id.'`,`'.$row->roles[0]->name.'`)" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                    Ubah
                </button>
                <a href="#" type="button" onclick="alert_delete('.$row->id.',`'.$row->username.'`)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger btn-sm buttonDestroy">
                    Hapus
                </a>
                ';
            return $actionBtn;
        })
        ->rawColumns(['role','action'])
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
        // DB::beginTransaction();
        // try{
            // dd($request->role);
            $input = $request->only(['username','nama_lengkap']);
            $input['id']               = User::select('id')->orderBy('id','desc')->first()->id +1;
            $input['cl_perusahaan_id'] = 1;
            $input['cl_user_group_id'] = 1;
            $input['status']           = 1;
            $input['update_date']      = Carbon::now();
            $input['update_by']        = 'Administrator';
            $input['password']         = Hash::make('12345678');

            if ($request->role == 'help_desk'){
                $UserPublicModel = UserPublicModel::insert([
                    'id'            => IdStringRandom::stringRandom(),
                    'name'          => $request->nama_lengkap,
                    'email'         => $request->username . '@mail.com',
                ]);

                $input['isHelpdesk'] = $UserPublicModel->id;
            }

            // Store your file into directory and db
            User::insert($input);

            $role = Role::whereName($request->role)->first();
            $user = User::whereId($input['id'])->first();

            $user->assignRole($role);
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
                'nama_lengkap'      => $request->nama_lengkap,
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
            'message' => User::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return User::query()
        ->when($request->username_id, function($q) use($request){
            $q->where('username','like', '%'.$request->username_id.'%');
        })
        ->when($request->roles_id, function($q) use($request){
            return $q->whereIn('id', is_array($request->roles_id) ? $request->roles_id : explode(',', $request->roles_id));
        })
        ->when($request->order, function($q) use($request){
            switch ($request->order[0]['column']) {
                case '2': $order = 'id'; break;
                case '3': $order = 'username'; break;
                case '4': $order = 'nama_lengkap'; break;
                default: $order = 'id'; break;
            }
            return $q->orderBy($order ,$request->order[0]['dir']);
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
