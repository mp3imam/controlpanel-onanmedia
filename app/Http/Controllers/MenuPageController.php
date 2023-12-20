<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PagesRoleModel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class MenuPageController extends Controller
{
    private $title = 'Data Menu Pages';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(Role::with(['pages.rolePage'])->get());
        //  $this->middleware('permission:Users Panel');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('menu_page.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return DataTables::of($this->models($request))
        ->addColumn('parents', function ($row){
            return Permission::whereId($row->module_parent)->first()->name ?? '-';
        })
        ->rawColumns(['parents'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $save = $request->status ?
            PagesRoleModel::insert([
                'permission_id'  => $request->get('permission_id'),
                'role_id'  => $request->get('role_id'),
            ])
        :
            PagesRoleModel::wherePermissionId($request->get('permission_id'))
            ->whereRoleId($request->get('role_id'))
            ->delete();



        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => $save
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
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => Permission::findOrFail($request->id)->update(['module_status' => $request->status])
        ]);
    }

    function update_menu(Request $request) {

        $update = [
            'name' => $request->name,
            'module_url' => $request->module_url,
            'module_position' => $request->module_position,
        ];

        if (isset($request->modal_parent_id))
        $update['parent_id'] = $request->modal_parent_id;

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => Permission::findOrFail($request->id)->update($update)
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
        return Permission::query()
        // ->where('module_parent', 0)
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
                default: $order = 'module_parent'; $order_2 = 'module_position'; break;
            }
            return $q->orderBy($order ,$request->order[0]['dir'])->orderBy($order_2 ,$request->order[0]['dir']);
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
