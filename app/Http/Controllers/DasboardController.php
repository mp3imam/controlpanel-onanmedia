<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Models\AbsenKaryawanOnanmediaModel;
use App\Models\AntrianModel;
use App\Models\LogActivitiesModel;
use App\Models\logUserModel;
use App\Models\SatkerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DasboardController extends Controller
{
    private $title = 'Cockpit Smart Monitoring';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('dasboard.index', $title);
    }

    public function create(Request $request)
    {
        return
            DataTables::of(
                $this->models($request)
            )
            ->addColumn('namaUser', function ($row) {
                return $row->user->nama_lengkap;
            })
            ->addColumn('tanggal', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->addColumn('waktu', function ($row) {
                return Carbon::parse($row->created_at)->format('H:i:s');
            })
            ->addColumn('status', function ($row) {
                return $row->created_at;
            })
            ->rawColumns(['namaUser', 'tanggal', 'waktu'])
            ->make(true);
    }

    public function models($request)
    {
        return AbsenKaryawanOnanmediaModel::with('user')->whereDate('created_at', date('Y-m-d'))->get();
    }

    public function absen(Request $request)
    {
        $img = $request->image;
        $folderPath = "public/";

        $image_parts = explode(";base64,", $img);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        $jenis_absen = "Masuk";
        if (AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->exists()) {
            $jenis_absen = "Pulang";
        }

        AbsenKaryawanOnanmediaModel::create([
            'user_id'       => auth()->user()->id,
            'jenis_absen'   => $jenis_absen,
            'keterangan'    => $request->keterangan ?? null,
            'foto'          => asset('/storage' . '/' . $fileName)
        ]);

        return redirect('/');
    }
}
