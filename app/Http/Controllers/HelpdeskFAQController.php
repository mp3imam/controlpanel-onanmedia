<?php

namespace App\Http\Controllers;

use App\Helpers\IdStringRandom;
use App\Models\AdminBalasanTemplateModel;
use App\Models\HelpdeskDetailModel;
use App\Models\HelpdeskFAQDetailModel;
use App\Models\HelpdeskFileDetailModel;
use App\Models\HelpdeskModel;
use App\Models\TemporaryFileUploadHelpdesk;
use App\Models\UserPublicModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class HelpdeskFAQController extends Controller
{
    private $title = 'Data FAQ';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Helpdesk FAQ');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('helpdesk_faq.index', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return
            DataTables::of($this->models($request))
            ->addColumn('kategori', function ($row) {
                return $row->faq->Judul;
            })
            ->rawColumns(['kategori'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = [
            'balasan'     => 'nullable',
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
        DB::beginTransaction();
        try {
            // Store your file into directory and db
            $user = UserPublicModel::whereId(Auth::user()->isHelpdesk)->first();
            HelpdeskModel::findOrFail($request->helpdesk_id)->update([
                'helpdeskStatusId'  => 2,
                'adminId'           => $user->id,
                'adminName'         => $user->nama_lengkap,
            ]);

            $helpdeskDetail = new HelpdeskDetailModel();
            $helpdeskDetail->id         = IdStringRandom::stringRandom();
            $helpdeskDetail->userId     = $user->id;
            $helpdeskDetail->helpdeskId = $request->helpdesk_id;
            $helpdeskDetail->name       = $user->nama_lengkap;
            $helpdeskDetail->pesan      = $request->balasan ?? '';
            $helpdeskDetail->role       = "ADMIN";
            $helpdeskDetail->helpdeskStatusId = 2;
            $helpdeskDetail->save();

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->whereStatus(0)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->whereStatus(0)->get() as $gambar) {
                    HelpdeskFileDetailModel::insert([
                        'id'             => IdStringRandom::stringRandom(),
                        'helpDeskId'     => $request->helpdesk_id,
                        'helpdeskChatId' => $helpdeskDetail->id,
                        'fileName'       => $gambar->filename,
                        'url'            => $gambar->url,
                    ]);
                }
            TemporaryFileUploadHelpdesk::whereStatus(0)->update(['status' => 1]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => HelpdeskDetailModel::with(['userPublic', 'file_details'])->whereId($helpdeskDetail->id)->first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = HelpdeskModel::findOrFail($id)->first();

        return view('helpdesk_faq.detail', $title, compact(['detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = HelpdeskFAQDetailModel::with(['faq'])->findOrFail($id);
        return view('helpdesk_faq.detail', $title, compact(['detail']));
    }

    public function template_balasan()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data'   => AdminBalasanTemplateModel::where('isAktif', 1)->get()->all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        try {
            // Store your file into directory and db
            $update = [
                'nama' => $request->pendidikan,
            ];

            $user = HelpdeskModel::findOrFail($id)->update($update);
            DB::commit();
        } catch (\Exception $e) {
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
    public function destroy($id)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => HelpdeskFAQDetailModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request)
    {
        return HelpdeskFAQDetailModel::with(['faq'])
            ->whereNull('deletedAt')
            ->when($request->cari, function ($q) use ($request) {
                $q->where('Title', 'ilike', '%' . $request->cari . '%')
                    ->orWhere('Content', 'ilike', '%' . $request->cari . '%')
                    ->orWhereHas('faq', function ($q) use ($request) {
                        $q->where('Judul', 'ilike', '%' . $request->cari . '%');
                    });
            })
            ->when($request->order, function ($q) use ($request) {
                if ($request->order[0]['column'] == "0")
                    return  $q->whereHas('faq')->orderBy('Judul');

                switch ($request->order[0]['column']) {
                    case '1':
                        $order = 'Judul';
                        break;
                    case '2':
                        $order = 'Judul';
                        break;
                    case '3':
                        $order = 'Judul';
                        break;
                    case '4':
                        $order = 'Judul';
                        break;
                    case '5':
                        $order = 'Judul';
                        break;
                    case '6':
                        $order = 'Judul';
                        break;
                    default:
                        $order = 'Judul';
                        break;
                }
                return $q->orderBy($order, $request->order[0]['dir']);
            })
            ->get();
    }

    public function status_faq(Request $request)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => HelpdeskFAQDetailModel::findOrFail($request->id)->update(['is_aktif' => 1])
        ]);
    }
}