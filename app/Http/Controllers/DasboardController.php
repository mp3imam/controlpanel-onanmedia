<?php

namespace App\Http\Controllers;

use App\Models\AbsenKaryawanOnanmediaModel;
use App\Models\DataKaryawanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

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

        $kehadiran = AbsenKaryawanOnanmediaModel::where('jenis_absen', 'Masuk')->whereDate('created_at', date('Y-m-d'))->where(function ($q) {
            $q->whereStatus('Hadir')
                ->orWhere('status', 'Telat');
        })->get()->pluck('user_id');
        $hadir = AbsenKaryawanOnanmediaModel::where('jenis_absen', 'Masuk')->whereStatus('Hadir')->whereDate('created_at', date('Y-m-d'))->get()->pluck('user_id');
        $data_karyawan = DataKaryawanModel::whereStatus(1)->whereNotIn('id', [1, 6])->get()->pluck('id');
        $belum = $data_karyawan->diff($kehadiran);
        $telat = AbsenKaryawanOnanmediaModel::whereStatus('Telat')->whereDate('created_at', date('Y-m-d'))->get();
        $izin = AbsenKaryawanOnanmediaModel::whereStatus('Izin')->whereDate('created_at', date('Y-m-d'))->get();

        return view('dasboard.index', $title, compact(['telat', 'izin', 'hadir', 'belum', 'data_karyawan', 'kehadiran']));
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
            ->rawColumns(['namaUser', 'tanggal', 'waktu'])
            ->make(true);
    }

    public function belum(Request $request)
    {
        $kehadiran = AbsenKaryawanOnanmediaModel::where('jenis_absen', 'Masuk')->whereDate('created_at', date('Y-m-d'))->where(function ($q) {
            $q->whereStatus('Hadir')
                ->orWhere('status', 'Telat');
        })->get()->pluck('user_id');
        $data_karyawan = DataKaryawanModel::whereStatus(1)->whereNotIn('id', [1, 6])->get();

        return
            DataTables::of(
                $data_karyawan->diff($kehadiran)
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
            ->rawColumns(['namaUser', 'tanggal', 'waktu'])
            ->make(true);
    }


    public function models($request)
    {
        return AbsenKaryawanOnanmediaModel::with('user')
            ->whereDate('created_at', date('Y-m-d'))
            ->when($request->hari_ini && $request->hari_ini != 'belum', function ($q) use ($request) {
                return $q->whereStatus($request->hari_ini);
            })->get();
    }

    public function absen(Request $request)
    {
        // Jika absen masuk sudah ada
        if (
            AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->whereJenisAbsen('Masuk')->whereDate('created_at', date('Y-m-d'))->exists()
            && Carbon::now()->format('H:i:s') < '01:00:00 pm'
            // || AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->whereStatus('Izin')->whereDate('created_at', date('Y-m-d'))->exists()
        )
            return redirect('/');

        $img = $request->image;
        $folderPath = "public/";

        $image_parts = explode(";base64,", $img);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        $jenis_absen = "Masuk";
        $status = "Hadir";
        if (Carbon::now()->format('H:i:s') > '08:16:00 am') $status = "Telat";

        if (AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->exists()) {
            $jenis_absen = "Pulang";
            $status = "Telat";
            if (Carbon::now()->format('H:i:s') > '17:00:00 pm') $status = "Hadir";
        }
        if ($request->status) $status = $request->status;

        // jika absen pulang sudah ada akan replace data absen pulang
        if (AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->whereJenisAbsen('Pulang')->whereDate('created_at', date('Y-m-d'))->exists()) {
            AbsenKaryawanOnanmediaModel::where('user_id', auth()->user()->id)->whereJenisAbsen('Pulang')->whereDate('created_at', date('Y-m-d'))->update([
                'jenis_absen'   => $jenis_absen,
                'status'        => $status,
                'foto'          => asset('/storage' . '/' . $fileName),
                'keterangan'    => $request->keterangan ?? null,
                'created_at'    => Carbon::now()
            ]);
        } else {
            AbsenKaryawanOnanmediaModel::create([
                'user_id'       => auth()->user()->id,
                'jenis_absen'   => $jenis_absen,
                'status'        => $status,
                'keterangan'    => $request->keterangan ?? null,
                'foto'          => asset('/storage' . '/' . $fileName)
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => 'Data Berhasil']);
        }

        return redirect('/');
    }
}