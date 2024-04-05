<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
use App\Models\MasterJurnal;
use App\Models\MasterJurnalFile;
use App\Models\MasterKasBelanja;
use App\Models\MasterKasBelanjaDetail;
use App\Models\TemporaryFileUploadHelpdesk;
use App\Models\TransaksiKasDetail;
use App\Models\TransaksiKasFileModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasterBankCashController extends Controller
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
        // dd(MasterBankCashModel::with(['banks'])->first());
        $this->middleware('permission:Transaksi Kas');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $user = Auth::user()->roles->pluck('name');

        $semua = count(MasterBankCashModel::get()->where('kategori', 1));
        $permintaan = count(MasterBankCashModel::whereNull('status')->where('kategori', 1)->get());
        $disetujui = count(MasterBankCashModel::whereStatus(2)->where('kategori', 1)->get());

        return view('master_bank_cash.index', $title, compact(['user', 'permintaan', 'disetujui', 'semua']));
    }

    function get_datatable(Request $request)
    {
        return
            DataTables::of($this->models($request))
            ->addColumn('banks', function ($row) {
                return $row->coa_kas_saldo->uraian ?? '';
            })
            ->addColumn('tujuan', function ($row) {
                return $row->banks->nama ?? '';
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
            ->rawColumns(['banks', 'nominal_number', 'jenis'])
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
        $path = public_path("Finance/Kas_Saldo/" . date('Y') . "/" . date('m') . "/" . date('d'));
        !is_dir($path) && mkdir($path, 0777, true);

        $random_string = Str::random(25);

        return view('master_bank_cash.create', $title, compact('random_string'));
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
            'jenis_transaksi'   => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        DB::beginTransaction();
        try {
            $request['kategori'] = MasterBankCashModel::KATEGORY_KAS_SALDO;
            $tahun = Carbon::now()->format('Y');
            $model = count(MasterBankCashModel::withTrashed()->whereYear('created_at', $tahun)->get());
            $nomor = sprintf("%05s", $model + 1);
            $request['nomor_transaksi'] = $nomor . '/TRAN/KAS/' . $tahun;
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $MasterBankCashModel = MasterBankCashModel::create($request->except('_token'));

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    TransaksiKasFileModel::create([
                        'kas_id'    => $MasterBankCashModel->id,
                        'url'       => $gambar->url,
                        'filename'  => $gambar->filename,
                    ]);
                }

            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

            $request['debet'] = $request->nominal;
            $request['kredit'] = $request->nominal;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_SALDO;
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;
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
                        'jurnal_umum_id' => $masterJurnal->id,
                        'path'           => 'kas_saldo',
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

        $detail = MasterBankCashModel::findOrFail($id)->first();

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

        $details = MasterBankCashModel::with(['details.akun_belanja', 'details.satuan_belanja'])->findOrFail($id);
        $nomor_transaksi = collect();

        $nomor_transaksi = $details->details->groupBy('nomor_transaksi')->map(function ($group) {
            $total_jumlah = $group->sum(function ($item) {
                return (int) str_replace('Rp.', '', $item->jumlah);
            });
            $transaction = $group->first();
            return [
                'nomor' => $transaction->nomor_transaksi,
                'detail' => $group,
                'jumlah' => $total_jumlah
            ];
        });

        return view('master_bank_cash.edit', $title, compact(['details', 'nomor_transaksi']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve_list(Request $request)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;
        $detail = MasterBankCashModel::whereId($request->id)->first();
        $detail_belanja = MasterKasBelanja::whereIn('id', explode(',', $detail->belanjas_id))->with(['belanja_barang' => function ($q) {
            $q->whereStatus(1)->with(['satuan_barang', 'coa_belanja']);
        }])->get();

        $checked_sum = $detail_belanja->sum(function ($item) {
            return $item->belanja_barang->sum('jumlah');
        });
        return view('master_bank_cash.approve', $title, compact(['detail', 'detail_belanja', 'checked_sum']));
    }

    function approve_direktur(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('file');
            $path = public_path('kas_saldo/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);

            $status = 0;
            foreach ($request->belanja_id_detail as $kasBelanja => $belanja) {
                if ($request->selectDetail[$kasBelanja] == 1) {
                    $status = 2;

                    MasterBankCashModel::whereId($request->id)->update([
                        'status'  => $status,
                        'image'   => asset('kas_belanja/') . "/" . $imageName,
                        'bank_id' => $request->sumber_dana,
                        'tujuan_id' => 7,
                        'nominal_approve' => $request->seluruh_total,
                    ]);

                    $kasDetail = [
                        'kas_id'     => $request->id,
                        'account_id' => $request->akun[$kasBelanja],
                        'keterangan' => $request->keterangan[$kasBelanja],
                        'nominal'    => $request->jumlah[$kasBelanja],
                        'nama_item'  => $request->nama_item[$kasBelanja],
                        'qty'        => $request->qty[$kasBelanja],
                        'satuan_id'  => $request->satuan[$kasBelanja],
                        'harga'      => $request->harga[$kasBelanja],
                        'jumlah'     => $request->jumlah[$kasBelanja],
                        'username'   => $request->username[$kasBelanja],
                        'status'     => 1,
                        'nomor_transaksi' => $request->nomor_transaksi[$kasBelanja],
                    ];

                    $foto = $request->{"foto" . $belanja};
                    if ($foto) $kasDetail += ['file' => $foto];

                    TransaksiKasDetail::create($kasDetail);


                    MasterKasBelanjaDetail::whereId($belanja)->update([
                        'status' => 2,
                        // 'keterangan' => $request->keterangan[$kasBelanja],
                    ]);
                    MasterKasBelanja::whereId($request->id)->update([
                        'status'  => 2
                    ]);
                } else {
                    MasterKasBelanjaDetail::whereId($belanja)->update([
                        'status' => $request->selectDetail[$kasBelanja],
                        // 'keterangan' => $request->keterangan[$kasBelanja],
                    ]);

                    MasterKasBelanja::whereId($request->id)->update([
                        'status'  => $status
                    ]);
                }
            }

            if ($status == 2) {
                $tahun = Carbon::now()->format('Y');
                $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
                $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
                $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');
                $request['dokumen'] = MasterBankCashModel::whereId($request->id)->first()->nomor_transaksi;
                $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
                $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

                $request['debet'] = $request->seluruh_total;
                $request['kredit'] = $request->seluruh_total;
                $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_SALDO;
                $masterJurnal = MasterJurnal::create($request->except('_token'));
                $request['jurnal_umum_id'] = $masterJurnal->id;
                $request['account_id'] = 7;
                $request['debet'] = $request->seluruh_total;
                $request['kredit'] = 0;
                $request['keterangan'] = "";
                JurnalUmumDetail::create($request->except('_token'));
                $request['account_id'] = $request->sumber_dana;
                $request['debet'] = 0;
                $request['kredit'] = $request->seluruh_total;
                JurnalUmumDetail::create($request->except('_token'));
            } else {
                MasterBankCashModel::find($request->id)->delete();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }

        return redirect('master_bank_cash');
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
            'tanggal_transaksi' => 'required',
            'bank_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'nominal'           => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        DB::beginTransaction();
        try {
            $request['kategori'] = MasterBankCashModel::KATEGORY_KAS_SALDO;
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            MasterBankCashModel::find($id)->update($request->except(['_token', '_method']));

            if (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->exists())
                foreach (TemporaryFileUploadHelpdesk::whereToken($request->random_text)->get() as $gambar) {
                    TransaksiKasFileModel::create([
                        'kas_id'    => $id,
                        'url'       => $gambar->url,
                        'filename'  => $gambar->filename,
                    ]);
                }

            // Edit Jurnal Umum, hapus detail
            $request['keterangan_jurnal_umum'] = $request->keterangan;
            $request['debet'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $request['kredit'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $nomor = MasterJurnal::whereDokumen(MasterBankCashModel::whereId($id)->first()->nomor_transaksi)->first();
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
                        'path'           => 'kas_saldo',
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
            MasterBankCashModel::findOrFail($id)->delete();
            MasterJurnal::whereDokumen(MasterBankCashModel::whereId($id)->nomor_transaksi)->delete();
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

    public function models($request)
    {
        return MasterBankCashModel::kasSaldo()->with(['coa_kas_saldo', 'banks'])
            ->when($request->q == MasterBankCashModel::STATUS_PERMINTAAN || $request->q == null, function ($q) {
                $q->whereNull('status');
            })
            ->when($request->q == MasterBankCashModel::STATUS_DISETUJUI, function ($q) {
                $q->whereStatus(2);
            })
            ->when($request->cari_cash, function ($q) use ($request) {
                $q->where('nomor_transaksi', 'ilike', '%' . $request->cari_cash . "%")
                    ->orWhere('keterangan', 'ilike', '%' . $request->cari_cash . "%");
            })
            ->when($request->tanggal_cash, function ($q) use ($request) {
                $tanggal = explode(" to ", $request->tanggal_cash);
                $q->when(count($tanggal) == 1, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', Carbon::parse($tanggal[0])->format('Y-m-d'));
                });
                $q->when(count($tanggal) == 2, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', '>=', Carbon::parse($tanggal[0])->format('Y-m-d'))->where('tanggal_transaksi', '<=', Carbon::parse($tanggal[1])->format('Y-m-d'));
                });
            })
            // Default 3 Bulan Ke Belakang
            ->when($request->tanggal_cash == null, function ($q) use ($request) {
                $q->where('tanggal_transaksi', '>=', Carbon::now()->subMonths(3)->firstOfMonth()->format('Y-m-d'))->where('tanggal_transaksi', '<=', Carbon::now()->format('Y-m-d'));
            })
            ->where('kategori', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function softdelete_kas_isi_saldo(Request $request)
    {
        DB::beginTransaction();
        try {
            MasterJurnal::whereDokumen(MasterBankCashModel::whereId($request->id)->first()->nomor_transaksi)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan
            ]);

            MasterBankCashModel::findOrFail($request->id)->update([
                'deleted_at' => Carbon::now(),
                'alasan' => $request->alasan
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
