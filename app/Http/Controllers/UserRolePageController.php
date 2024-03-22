<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserRolePageController extends Controller
{
    private $title = 'Data Users Role Pages';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:'.Permission::whereId(24)->active()->first()->name);
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('users_role_page.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return
        DataTables::of($this->models($request))
        ->addColumn('pages', function ($row){
            $data = collect();
            foreach($row->pages as $page){
                $data->push(
                    $page->rolePage->alias
                );
            }
            return $data->implode('|');
        })
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $role = Role::findOrFail($request->role_id);

        if ($request->status) {
            $role->assignRole($request->name);
        } else {
            $role->removeRole($request->name);
        }

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => $role,
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
    public function edit(Request $request, $id){
        return
        DataTables::of(
            Permission::leftJoin('role_has_permissions', function($join) use ($id) {
                $join->on('permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where('role_has_permissions.role_id', '=', $id);
            })
            ->get()
        )
        ->make(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        dd($request->all());
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
        // DB::beginTransaction();
        // try{
            // Store your file into directory and db
            $update = [
                'username'          => $request->username,
                'nama_lengkap'      => $request->nama_lengkap,
                'update_by'         => 'Administrator',
            ];

            $role = Role::whereName($request->role)->first();
            $user = User::findOrFail($id)->update($update);
            $role->syncRoles($request->role);

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
            'message' => User::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return Role::with(['pages.rolePage'])
        // ->select('Role.*, ')
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
