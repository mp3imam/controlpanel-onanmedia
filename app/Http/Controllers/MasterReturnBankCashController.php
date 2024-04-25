<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
use App\Models\MasterReturnBankCashModel;
use App\Models\MasterJurnal;
use App\Models\MasterJurnalFile;
use App\Models\TemporaryFileUploadHelpdesk;
use App\Models\TransaksiKasFileModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MasterReturnBankCashController extends Controller
{
    private $title = 'Master Transaksi Kas';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Transaksi Kas');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('master_bank_cash.index', $title);
    }

    function get_datatable(Request $request)
    {
        return
            DataTables::of($this->models($request))
            ->addColumn('banks', function ($row) {
                return $row->banks_kembali->nama;
            })
            ->addColumn('tujuan', function ($row) {
                return $row->coa_kas_kembali->uraian;
            })
            ->addColumn('jenis', function ($row) {
                return $row->jenis_transaksi == 1 ? "Transfer" : "Cash";
            })
            ->addColumn('nominal_number', function ($row) {
                return "Rp. " . number_format($row->nominal, 0);
            })
            ->addColumn('tanggal', function ($row) {
                return Carbon::parse($row->tanggal_transaksi)->format('d-m-Y');
            })
            ->rawColumns(['banks', 'tujuan', 'nominal_number', 'jenis', 'tanggal'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;
        $random_string = Str::random(25);

        return view('master_return_bank_cash.create', $title, compact('random_string'));
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
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'tujuan_id'         => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        DB::beginTransaction();
        try {
            // Store your file into directory and db
            $request['kategori'] = MasterBankCashModel::KATEGORY_KAS_PENGEMBALIAN;
            $tahun = Carbon::now()->format('Y');
            $model = count(MasterReturnBankCashModel::withTrashed()->whereYear('created_at', '=', $tahun)->get());
            $nomor = sprintf("%05s", $model + 1);
            $request['nomor_transaksi'] = "$nomor/TRAN/KAS/$tahun";
            $request['nominal'] = str_replace(",", "", $request->nominal);
            $MasterReturnBankCashModel = MasterReturnBankCashModel::create($request->except('_token'));

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    TransaksiKasFileModel::create([
                        'kas_id'    => $MasterReturnBankCashModel->id,
                        'url'       => $gambar->url,
                        'filename'  => $gambar->filename,
                    ]);
                }

            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_jurnal_umum'] = $request->keterangan;

            $request['kredit'] = $request->nominal;
            $request['debet'] = $request->nominal;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_PENGEMBALIAN;
            $masterJurnal = MasterJurnal::create($request->except('_token'));

            $request['keterangan'] = "";
            $request['jurnal_umum_id'] = $masterJurnal->id;
            $request['account_id'] = $request->tujuan_id;
            $request['debet'] = $request->nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $request->bank_id;
            $request['kredit'] = $request->nominal;
            $request['debet'] = 0;
            JurnalUmumDetail::create($request->except('_token'));

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    MasterJurnalFile::create([
                        'jurnal_umum_id' => $masterJurnal->id,
                        'path'           => 'kas_belanja',
                        'filename'       => $gambar->filename,
                    ]);
                }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('master_bank_cash');
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = date('H:i:s') . '.' . $image->extension();
        $path = public_path("kas/return-kas/" . date('Y') . "/" . date('m') . "/" . date('d'));
        !is_dir($path) && mkdir($path, 0777, true);
        $image->move($path, $imageName);

        TemporaryFileUploadHelpdesk::create([
            'folder' => 'jurnal_umum',
            'url' => asset("kas/return-kas/" . date('Y') . "/" . date('m') . "/" . date('d') . "/" . $imageName),
            'filename' => $imageName,
            'token' => $request->random_text
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

        $detail = MasterReturnBankCashModel::with(['banks', 'coa_kas_kembali'])->findOrFail($id)->first();

        return view('master_bank_cash.detail', $title, compact(['detail']));
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

        $detail = MasterReturnBankCashModel::with(['banks_kembali', 'coa_kas_kembali', 'file'])->findOrFail($id);
        $random_string = Str::random(25);

        return view('master_return_bank_cash.edit', $title, compact(['detail', 'random_string']));
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
        $request->validate([
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'tujuan_id'         => 'required',
            'nominal'           => 'required',
        ]);

        DB::beginTransaction();
        try {
            $request['kategori'] = MasterBankCashModel::KATEGORY_KAS_PENGEMBALIAN;
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $MasterReturnBankCashModel = MasterReturnBankCashModel::whereId($id)->first();
            $MasterReturnBankCashModel->update($request->except(['_token', '_method']));
            $MasterReturnBankCashModel->fresh();

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    TransaksiKasFileModel::create([
                        'kas_id'    => $MasterReturnBankCashModel->id,
                        'url'       => $gambar->url,
                        'filename'  => $gambar->filename,
                    ]);
                }

            // Edit Jurnal Umum, hapus detail
            $request['keterangan_jurnal_umum'] = $request->keterangan;
            $request['debet'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $request['kredit'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $nomor = MasterJurnal::whereDokumen(MasterReturnBankCashModel::whereId($id)->first()->nomor_transaksi)->first();
            $nomor->update($request->except(['_token', '_method', 'account_id', 'keterangan_kas', 'akun_belanja', 'keterangan', 'nilai', 'total_nilai', 'attachment']));
            $nomor->fresh();
            JurnalUmumDetail::whereJurnalUmumId($nomor->id)->delete();

            $request['keterangan'] = '';
            $request['jurnal_umum_id'] = $nomor->id;
            $request['account_id'] = $request->tujuan_id;
            $request['debet'] = $request->nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $request->bank_id;
            $request['debet'] = 0;
            $request['kredit'] = $request->nominal;
            JurnalUmumDetail::create($request->except('_token'));

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    MasterJurnalFile::create([
                        'jurnal_umum_id' => $nomor->id,
                        'path'           => 'kas_belanja',
                        'filename'       => $gambar->filename,
                    ]);
                }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect('master_bank_cash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            MasterReturnBankCashModel::findOrFail($id)->delete();
            MasterJurnal::whereDokumen(MasterReturnBankCashModel::whereId($id)->nomor_transaksi)->delete();
            DB::commit();
            $status = 'Success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $status = "Error $th";
        }

        return response()->json([
            'status'  => Response::HTTP_BAD_REQUEST,
            'message' => $status
        ]);
    }

    public function softdelete_pengembalian_kas(Request $request)
    {
        DB::beginTransaction();
        try {
            MasterJurnal::whereDokumen(MasterReturnBankCashModel::whereId($request->id)->first()->nomor_transaksi)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan
            ]);

            MasterReturnBankCashModel::findOrFail($request->id)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan,
                'keterangan_jurnal_umum' => $request->alasan,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
        ]);
    }

    public function models($request)
    {
        return MasterReturnBankCashModel::KasPengembalian()->with(['banks_kembali', 'coa_kas_kembali', 'file'])
            ->when($request->cari_return, function ($q) use ($request) {
                $q->where('nomor_transaksi', 'ilike', '%' . $request->cari_return . "%")
                    ->orWhere('keterangan', 'ilike', '%' . $request->cari_return . "%");
            })
            ->when($request->tanggal_return, function ($q) use ($request) {
                $tanggal = explode(" to ", $request->tanggal_return);
                $q->when(count($tanggal) == 1, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', Carbon::parse($tanggal[0])->format('Y-m-d'));
                });
                $q->when(count($tanggal) == 2, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', '>=', Carbon::parse($tanggal[0])->format('Y-m-d'))->where('tanggal_transaksi', '<=', Carbon::parse($tanggal[1])->format('Y-m-d'));
                });
            })
            // Default 3 Bulan Ke Belakang
            ->when($request->tanggal_return == null, function ($q) use ($request) {
                $q->where('tanggal_transaksi', '>=', Carbon::now()->subMonths(3)->firstOfMonth()->format('Y-m-d'))->where('tanggal_transaksi', '<=', Carbon::now()->format('Y-m-d'));
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function hapus_foto(Request $request)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => TransaksiKasFileModel::findOrFail($request->id)->delete()
        ]);
    }

    public function pdf(Request $request)
    {
        $datas = $this->models($request);

        $pdf = Pdf::loadview(
            'users.pdf',
            [
                'name'  => 'Data Master Bank Cash',
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-Master-Bank-Cash-PDF');
    }
}
