<?php

namespace App\Http\Controllers;

use App\Models\AbsenKaryawanOnanmediaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HrdAbsensiController extends Controller
{
    private $title = 'Data Absensi Karyawan';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(HelpdeskModel::with(['jasas', 'keluhan_user', 'statuses', 'adminOnan'])->first());
        // $this->middleware('permission:Absensi Karyawan');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('absensi_karyawan.index', $title);
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
            ->addColumn('namaUser', function ($row) {
                return $row->user->nama_lengkap;
            })
            ->addColumn('tanggal', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->addColumn('waktu', function ($row) {
                return Carbon::parse($row->created_at)->format('H:i:s');
            })
            ->rawColumns(['namaUser', 'tanggal', 'waktu'])
            ->make(true);
    }

    public function models($request)
    {
        return AbsenKaryawanOnanmediaModel::with(['user'])
            ->when($request->cari_user, function ($q) use ($request) {
                $q->where('user_id', $request->cari_user);
            })
            ->when($request->cari_tanggal, function ($q) use ($request) {
                $tanggal = explode(" to ", $request->cari_tanggal);
                $q->when(count($tanggal) == 1, function ($q) use ($tanggal) {
                    $q->whereDate('created_at', Carbon::createFromFormat('d-m-Y', $tanggal[0])->format('Y-m-d'));
                });
                $q->when(count($tanggal) == 2, function ($q) use ($tanggal) {
                    $q->whereDate('created_at', '>=', Carbon::createFromFormat('d-m-Y', $tanggal[0])->format('Y-m-d'))->whereDate('created_at', '<=', Carbon::createFromFormat('d-m-Y', $tanggal[1])->addDays(1)->format('Y-m-d'));
                });
            })
            ->when($request->cari_status, function ($q) use ($request) {
                $q->whereStatus($request->cari_status);
            })
            ->when($request->order, function ($q) use ($request) {
                if ($request->order[0]['column'] == "0")
                    return  $q->orderBy('created_at');

                switch ($request->order[0]['column']) {
                    case '1':
                        $order = 'user_id';
                        break;
                    case '2':
                        $order = 'user_id';
                        break;
                    case '3':
                        $order = 'created_at';
                        break;
                    case '4':
                        $order = 'created_at';
                        break;
                    case '5':
                        $order = 'status';
                        break;
                    case '6':
                        $order = 'jenis_absen';
                        break;
                    default:
                        $order = 'created_at';
                        break;
                }
                return $q->orderBy($order, $request->order[0]['dir']);
            })
            ->get();
    }

    public function pdf(Request $request)
    {
        $datas = $this->models($request);
        $pdf = Pdf::loadview(
            'absensi_karyawan.pdf',
            [
                'name'  => 'Data Absensi Karyawan',
                'periode' => $request->cari_tanggal,
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-absensi-karyawan-PDF');
    }
}
