<?php

namespace App\Http\Controllers;

use App\Helpers\IdStringRandom;
use App\Models\HelpdeskDetailModel;
use App\Models\HelpdeskFileModel;
use App\Models\HelpdeskModel;
use App\Models\TemporaryFileUpload;
use App\Models\TemporaryFileUploadHelpdesk;
use App\Models\TemporaryFileUploadJurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\Help;
use Yajra\DataTables\Facades\DataTables;

class HelpdeskController extends Controller
{
    private $title = 'Data Helpdesk';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(HelpdeskModel::with(['jasas','keluhan_user','statuses','adminOnan'])->first());
        $this->middleware('permission:Dashboard Helpdesk');
    }

    public function index(){
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('helpdesk.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return
        DataTables::of($this->models($request))
        ->addColumn('keluhan_nama', function ($row){
            return $row->keluhan_user->name;
        })
        ->addColumn('keluhan_email', function ($row){
            return $row->keluhan_user->email;
        })
        ->addColumn('admin_id', function ($row){
            return $row->adminOnan->name ?? '-';
        })
        ->addColumn('tanggal_keluhan', function ($row){
            return Carbon::parse($row->created_at)->format('d-m-Y');
        })
        ->addColumn('statuss', function ($row){
            return $row->statuses->nama;
        })
        ->rawColumns(['keluhan_nama','keluhan_email','tanggal_keluhan','statuss'])

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
            'balasan'     => 'required',
            'random_text' => 'required',
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
            $user = Auth::user();
            HelpdeskModel::findOrFail($request->helpdesk_id)->update([
                'helpdeskStatusId'  => 2,
                'adminId'           => $user->id,
                'adminName'         => $user->nama_lengkap,
            ]);

            $tanggal = Carbon::now();
            $helpdeskDetail = new HelpdeskDetailModel();
            $helpdeskDetail->id         = IdStringRandom::stringRandom();
            // $helpdeskDetail->userId     = $user->id;
            $helpdeskDetail->userId     = 'clqyuvzre0001pvyyfobnln0j';
            $helpdeskDetail->helpdeskId = $request->helpdesk_id;
            $helpdeskDetail->createdAt  = $tanggal;
            $helpdeskDetail->updatedAt  = $tanggal;
            $helpdeskDetail->pesan      = $request->balasan;
            $helpdeskDetail->role       = "Admin";
            $helpdeskDetail->helpdeskStatusId = 2;
            // dd($helpdeskDetail);
            $helpdeskDetail->save();

            // $files = TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exsits();
            // if ($files)
            // foreach ($files->get() as $gambar) {
            //     HelpdeskFileModel::insert([
            //         'id'         => IdStringRandom::stringRandom(),
            //         'helpDeskId' => $request->helpdesk_id,
            //         'helpDeskChatId' => $helpdeskDetail->id,
            //         'fileName' => $gambar->filename,
            //         'url' => $gambar->url,
            //     ]);
            // }

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

        $detail = HelpdeskModel::findOrFail($id)->first();

        return view('helpdesk.detail', $title, compact(['detail']));
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

        $detail = HelpdeskModel::with(['user_public','detail.file','detail.userPublic','file','jasas','order.orderJasa','order.penjual','order.pembeli'])
        ->findOrFail($id);
        // dd($detail);

        return view('helpdesk.detail', $title, compact(['detail']));
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
            'id'         => 'required',
            'pendidikan' => 'required',
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

            $user = HelpdeskModel::findOrFail($id)->update($update);
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
            'message' => HelpdeskModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request){
        return HelpdeskModel::with(['jasas','keluhan_user','statuses','adminOnan'])
        ->orderBy('createdAt','desc')
        ->get();
    }

    public function uploadImage(Request $request){
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $path = public_path('helpdesk/');
        !is_dir($path) && mkdir($path, 0777, true);

        $image->move($path, $imageName);

        TemporaryFileUploadJurnal::create([
            'folder' => 'jurnal_umum',
            'url' => asset("helpdesk/$imageName"),
            'filename' => $imageName,
            'token' => $request->random_text
        ]);

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
