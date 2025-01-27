<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
use App\Models\MasterJurnal;
use App\Models\MasterKasBelanja;
use App\Models\MasterKasBelanjaDetail;
use App\Models\MasterKasBelanjaFile;
use App\Models\MasterKasBelanjaString;
use App\Models\TemporaryFileUpload;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasterKasBelanjaController extends Controller
{
    private $title = 'Form Isian Transaksi Belanja';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Transaksi Belanja');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;
        $user = Auth::user();
        $finance = $user->hasRole('finance');

        $all = count(MasterKasBelanja::when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $create = count(MasterKasBelanja::BelanjaCreate()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $on_progress = count(MasterKasBelanja::BelanjaOnProgress()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $prosess = count(MasterKasBelanja::BelanjaProses()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $tolak = count(MasterKasBelanja::BelanjaTolak()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $histori = count(MasterKasBelanja::BelanjaHistory()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $pending = count(MasterKasBelanja::BelanjaPending()->when(!$finance, function ($q) use ($user) {
            $q->whereUserId($user->id);
        })->get());
        $checked = MasterKasBelanja::whereChecked(1)->with('belanja_barang', function ($q) {
            $q->whereStatus(1);
        })->get('id');
        $checked_id = implode(',', $checked->pluck('id')->toArray());
        $checked_sum = $checked->sum(function ($item) {
            return $item->belanja_barang->sum('jumlah');
        });

        return view('master_kas_belanja.index', $title, compact(['all', 'create', 'finance', 'on_progress', 'prosess', 'tolak', 'histori', 'pending', 'checked_id', 'checked_sum']));
    }

    function get_datatable(Request $request)
    {
        return
            DataTables::of($this->models($request))
            ->addColumn('banks', function ($row) {
                return $row->coa_belanja ? $row->coa_belanja->uraian : '-';
            })
            ->addColumn('username', function ($row) {
                return $row->users->nama_lengkap;
            })
            ->addColumn('role', function ($row) {
                return $row->users->roles[0]->name;
            })
            ->addColumn('nominals', function ($row) {
                return "Rp. " . number_format($row->nominal, 0);
            })
            ->addColumn('nominals_approve', function ($row) {
                return "Rp. " . number_format($row->nominal_approve, 0);
            })
            ->addColumn('jenis_transaksi', function ($row) {
                return $row->jenis == 1 ? "Transfer" : "Cash";
            })
            ->addColumn('tanggal', function ($row) {
                return Carbon::parse($row->tanggal_transaksi)->format('d-m-Y');
            })
            ->addColumn('status_name', function ($row) {
                return $row->statuses->nama ?? '';
            })
            ->rawColumns(['banks', 'nominals', 'jenis_transaksi', 'tanggal', 'status_name'])
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

        return view('master_kas_belanja.create', $title);
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
            'deskripsi'   => 'required',
            'total_nilai' => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->messages());

        DB::beginTransaction();
        try {
            $tahun = Carbon::now()->format('Y');
            $model = MasterKasBelanja::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['nomor_transaksi'] = $nomor . '/TRAN/BLJ/' . $tahun;
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->total_nilai));
            $request['keterangan_kas'] = $request->deskripsi;
            $request['user_id'] = Auth::user()->id;
            $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');

            // Store your file into directory and db
            $kasBelanja = MasterKasBelanja::create($request->except('_token'));

            foreach ($request->nama_item as $item => $i) {
                $harga = str_replace(".", "", str_replace("Rp. ", "", $request->harga[$item]));
                $jumlah = str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]));

                $data = [
                    'kas_id'     => $kasBelanja->id,
                    'nama_item'  => $i,
                    'qty'        => $request->qty[$item],
                    'satuan_id'  => $request->satuan[$item],
                    'harga'      => $harga,
                    'jumlah'     => $jumlah,
                    'keterangan' => $request->keterangan[$item] ?? '',
                    'nominal'    => $request->nominal,
                    'status'     => 1,
                ];

                $file = $request->file('file' . $item);
                if ($file != null) {
                    $path = public_path('kas_belanja/');
                    $rand = rand(1000, 9999);
                    $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
                    $file->move($path, $imageName);

                    $data += [
                        'file'        => asset('kas_belanja/') . "/" . $imageName,
                    ];
                }

                MasterKasBelanjaDetail::create($data);
            }

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('master_kas_belanja');
    }

    public function upload_foto(Request $request)
    {
        foreach ($request->file('attachment') as $file) {
            $path = public_path('kas_belanja/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);

            TemporaryFileUpload::create([
                'folder' => 'kas_belanja',
                'filename' => $imageName,
                'token' => $request->header('X-Csrf-Token'),
                'created_by' => (int)Auth::user()->id
            ]);
        }
    }

    public function softdelete_kas_belanja(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now();
            MasterKasBelanja::findOrFail($request->id)->update([
                'deleted_at' => $date,
                'alasan' => $request->alasan
            ]);

            MasterJurnal::whereDokumen(MasterKasBelanja::withTrashed()->whereId($request->id)->first()->nomor_transaksi)->update([
                'deleted_at' => $date,
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list_pending_finance(Request $request, $id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = MasterKasBelanja::with(['belanja_barang' => function ($q) use ($request) {
            $q->with('satuan_barang')->when($request->filled('q'), function ($q) use ($request) {
                $q->where('status', $request->q);
            });
        }])->findOrFail($id);

        return view('master_kas_belanja.pending', $title, compact(['detail']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = MasterKasBelanjaString::with(['belanja_barang.coa_belanja', 'belanja_barang' => function ($q) use ($request) {
            $q->with('satuan_barang')->when($request->filled('q'), function ($q) use ($request) {
                $q->where('status', $request->q);
            })
                ->when($request->q == null, function ($q) use ($request) {
                    $q->where('status', 1);
                });
        }])->findOrFail($id);

        return view('master_kas_belanja.edit', $title, compact(['detail']));
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
            'id_detail' => 'required',
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->messages());

        DB::beginTransaction();
        try {
            // Store your file into directory and db
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->total_nilai));
            $request['keterangan_kas'] = $request->deskripsi;
            MasterKasBelanja::find($id)->update($request->except(['_token', '_method']));

            MasterKasBelanjaDetail::whereKasId($id)->delete();

            // Create New Detail and File Kas Belanja
            foreach ($request->nama_item as $item => $i) {
                $harga = str_replace(".", "", str_replace("Rp. ", "", $request->harga[$item]));
                $jumlah = str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]));
                $nominal = str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]));


                $update = MasterKasBelanjaDetail::firstOrNew(
                    ['id' => isset($request->id_item[$item]) ? $request->id_item[$item] : MasterKasBelanjaDetail::orderBy('id', 'desc')->first()->id + 1],
                );

                // Lakukan pembaruan jika record sudah ada
                $update->kas_id     = $request->id_detail;
                $update->keterangan = $request->keterangan[$item] ?? '';
                $update->nominal    = $nominal;
                $update->nama_item  = $request->nama_item[$item];
                $update->qty        = $request->qty[$item];
                $update->satuan_id  = $request->satuan[$item];
                $update->harga      = $harga;
                $update->jumlah     = $jumlah;
                $update->status     = 1;

                $file = $request->file('file' . $i);
                if ($file) {
                    $path = public_path('kas_belanja/');
                    $rand = rand(1000, 9999);
                    $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->getClientOriginalExtension();

                    $file->move($path, $imageName);

                    $update += ['file' => asset('kas_belanja/') . "/" . $imageName];
                }

                $update->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }

        return redirect('master_kas_belanja');
    }

    function checked_pending_finance(Request $request)
    {
        // DB::beginTransaction();
        // try {
        $kasBelanja = MasterKasBelanja::whereId($request->id_detail)->first();
        dd($kasBelanja);

        $tahun = Carbon::now()->format('Y');
        $model = MasterKasBelanja::withTrashed()->latest()->whereYear('created_at', '=', $tahun)->first();
        $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
        $request['nomor_transaksi'] = $nomor . '/TRAN/BLJ/' . $tahun;
        $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->total_nilai));
        $request['nominal_approve'] = str_replace(".", "", str_replace("Rp. ", "", $request->total_nilai));
        $request['status'] = 2;
        $request['checked'] = 1;
        $request['keterangan_kas'] = $kasBelanja->keterangan_kas . " - " . $kasBelanja->nomor_transaksi;
        $request['user_id'] = $kasBelanja->user_id;

        // Store your file into directory and db
        $kasBelanja = MasterKasBelanja::create($request->except('_token'));

        foreach ($request->nama_item as $item => $i) {
            if ($request->selectDetail[$item] !== 6) {
                $harga = str_replace(".", "", str_replace("Rp. ", "", $request->harga[$item]));
                $jumlah = str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]));

                $data = [
                    'kas_id'     => $kasBelanja->id,
                    'nama_item'  => $i,
                    'qty'        => $request->qty[$item],
                    'satuan_id'  => $request->satuan[$item],
                    'harga'      => $harga,
                    'jumlah'     => $jumlah,
                    'keterangan' => $request->keterangan[$item] ?? '',
                    'nominal'    => $request->nominal,
                    'status'     => $request->selectDetail[$item],
                    'account_id' => $request->akun[$item],
                ];

                $file = $kasBelanja->file;

                if ($file != null) {
                    $path = public_path('kas_belanja/');
                    $rand = rand(1000, 9999);
                    $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
                    $file->move($path, $imageName);

                    $data += [
                        'file' => asset('kas_belanja/') . "/" . $imageName,
                    ];
                }

                dd($data, $request->selectDetail[$item]);
                if ($request->selectDetail[$item] == 1) {
                    MasterKasBelanjaDetail::create($data);
                }
                MasterKasBelanjaDetail::whereId($request->id_item[$item])->delete();
            } else {
                $kasBelanja = MasterKasBelanja::whereId($request->id_detail)->first();
                dd($kasBelanja->nominal_pending);

                MasterKasBelanja::find($request->id_detail)->update([
                    'nominal_pending' => $kasBelanja->nominal_pending - (int) str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]))
                ]);
            }
        }

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     //     //throw $th;
        // }

        return redirect('master_kas_belanja');
    }

    function checked_finance(Request $request)
    {
        // dd($request->all());
        // DB::beginTransaction();
        // try {
        $nominal_approve = collect();
        $nominal_pending = collect();
        $nominal_tolak = collect();
        foreach ($request->id_item as $id => $i) {
            // dd($request->akun[$id]);
            MasterKasBelanjaDetail::find($i)->update([
                'account_id' => $request->akun[$id],
                'status'     => $request->selectDetail[$id],
                'keterangan' => $request->keterangan[$id] ?? '-'
            ]);
            if ($request->selectDetail[$id] == 1)
                $nominal_approve->push((int)str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$id])));
            if ($request->selectDetail[$id] == 6)
                $nominal_pending->push((int)str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$id])));
            if ($request->selectDetail[$id] == 4)
                $nominal_tolak->push((int)str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$id])));
        }

        // All Approve
        $status = 1;
        $checked = 0;

        // Checked
        if (in_array(1, $request->selectDetail)) {
            $status = 2;
            $checked = 1;
        } else {
            $status = 1;
            $checked = 0;
        }

        // Pending
        // if(in_array(4, $request->selectDetail)) $status = 4;

        MasterKasBelanja::find($request->id_detail)->update([
            'status'  => $status,
            'checked' => $checked,
            'nominal_approve' => $nominal_approve->sum(),
            'nominal_pending' => $nominal_pending->sum(),
            'nominal_tolak' => $nominal_tolak->sum()
        ]);

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     //throw $th;
        // }

        return redirect('master_kas_belanja');
    }

    function approve_finance(Request $request)
    {
        DB::beginTransaction();
        try {
            // All Approve
            $checked = 2;

            $request['kategori'] = MasterBankCashModel::KATEGORY_KAS_SALDO;
            $tahun = Carbon::now()->format('Y');
            $model = count(MasterBankCashModel::withTrashed()->whereYear('created_at', $tahun)->get());
            $nomor = sprintf("%05s", $model + 1);
            $request['nomor_transaksi'] = $nomor . '/TRAN/KAS/' . $tahun;
            $request['belanjas_id'] = $request->id;
            $belanja_id = explode(',', $request->id);
            $request['nominal'] = str_replace(".", "", str_replace("Rp. ", "", $request->nominal));
            $request['keterangan'] = count($belanja_id) . " Transaksi";
            MasterBankCashModel::create($request->except('_token'));

            foreach ($belanja_id as $id) {
                MasterKasBelanja::find($id)->update([
                    'checked' => $checked,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }

        return redirect('master_kas_belanja');
    }

    function upload_bukti_transfer_divisi_finance(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // All Approve
            $file = $request->file('upload_bukti');
            $path = public_path('upload_bukti/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);

            MasterKasBelanja::find($request->id_detail)->update([
                'status' => 3,
                'bukti_transfer_finance_to_divisi'   => asset('upload_bukti/') . "/" . $imageName,
            ]);

            foreach ($request->id_item as $item => $i) {
                MasterKasBelanjaDetail::find($i)->update([
                    'status' => 3,
                ]);
            }

            $tahun = Carbon::now()->format('Y');
            $masterKasBelanja = MasterKasBelanja::with('users')->whereId($request->id_detail)->first();

            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');
            $request['dokumen'] = $masterKasBelanja->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

            $request['debet'] = $masterKasBelanja->nominal_approve;
            $request['kredit'] = $masterKasBelanja->nominal_approve;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_BELANJA;
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;
            $request['account_id'] = $request->account_id;
            $request['debet'] = $masterKasBelanja->nominal_approve;
            $request['kredit'] = 0;
            $request['keterangan'] = $masterKasBelanja->users->nama_lengkap;
            JurnalUmumDetail::create($request->except('_token'));
            $request['keterangan'] = "";
            $request['account_id'] = 7;
            $request['debet'] = 0;
            $request['kredit'] = $masterKasBelanja->nominal_approve;
            JurnalUmumDetail::create($request->except('_token'));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }

        return redirect('master_kas_belanja');
    }

    function upload_bukti_transfer_finance_divisi(Request $request)
    {
        DB::beginTransaction();
        try {
            // All Approve
            $file = $request->file('upload_bukti_belanja');
            $path = public_path('upload_bukti/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);

            MasterKasBelanja::find($request->id_detail)->update([
                'bukti_transfer_divisi_to_finance'   => asset('upload_bukti/') . "/" . $imageName,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //     //throw $th;
        }

        return redirect('master_kas_belanja');
    }

    function finance_selesai(Request $request)
    {
        DB::beginTransaction();
        try {
            MasterKasBelanja::find($request->id_detail)->update([
                'status' => 5,
            ]);

            $tahun = Carbon::now()->format('Y');
            $masterKasBelanja = MasterKasBelanja::with('users')->whereId($request->id_detail)->first();

            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');
            $request['dokumen'] = $masterKasBelanja->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';

            $request['debet'] = $masterKasBelanja->nominal_approve;
            $request['kredit'] = $masterKasBelanja->nominal_approve;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_PEMBELIAN;
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;

            foreach ($request->id_item as $item => $i) {
                MasterKasBelanjaDetail::find($i)->update([
                    'status' => 5,
                ]);
                $nominal = str_replace(".", "", str_replace("Rp. ", "", $request->jumlah[$item]));

                $request['account_id'] = $request->akun[$item];
                $request['debet'] = $nominal;
                $request['kredit'] = 0;
                $request['keterangan'] = $request->nama_item[$item];
                JurnalUmumDetail::create($request->except('_token'));
            }

            $request['keterangan'] = "";
            $request['account_id'] = 7;
            $request['debet'] = 0;
            $request['kredit'] = $masterKasBelanja->nominal_approve;
            JurnalUmumDetail::create($request->except('_token'));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }

        return redirect('master_kas_belanja');
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
            MasterKasBelanja::findOrFail($id)->delete();
            MasterJurnal::whereDokumen(MasterKasBelanja::whereId($id)->nomor_transaksi)->delete();
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

    public function hapus_foto(Request $request)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => MasterKasBelanjaFile::findOrFail($request->id)->delete()
        ]);
    }

    public function models($request)
    {
        $user = Auth::user();
        return MasterKasBelanja::with(['coa_belanja', 'belanja_barang.satuan_barang', 'banks_belanja', 'statuses', 'users'])
            ->when($request->cari, function ($q) use ($request) {
                $q->where('nomor_transaksi', 'like', '%' . $request->cari . "%")
                    ->orWhere('nominal', 'like', '%' . $request->cari . "%")
                    ->orWhere('keterangan_kas', 'like', '%' . $request->cari . "%");
            })
            ->when($request->q == MasterKasBelanja::STATUS_CREATE, function ($q) {
                $q->BelanjaCreate();
            })
            ->when($request->q == NULL, function ($q) {
                $q->BelanjaCreate();
            })
            ->when($request->q == MasterKasBelanja::STATUS_ON_PROGRESS, function ($q) {
                $q->BelanjaOnProgress();
            })
            ->when($request->q == MasterKasBelanja::STATUS_PROSESS, function ($q) {
                $q->BelanjaProses();
            })
            ->when($request->q == MasterKasBelanja::STATUS_PENDING, function ($q) {
                $q->BelanjaPending();
            })
            ->when($request->q == MasterKasBelanja::STATUS_HISTORY, function ($q) {
                $q->BelanjaHistory();
            })
            ->when($request->q == MasterKasBelanja::STATUS_TOLAK, function ($q) {
                $q->BelanjaTolak();
            })
            ->when($user->roles[0]->name !== 'finance', function ($q) use ($user) {
                $q->whereUserId($user->id);
            })
            ->when($request->sumber, function ($q) use ($request) {
                $q->whereJenis($request->sumber);
            })
            ->when($request->tanggal, function ($q) use ($request) {
                $tanggal = explode(" to ", $request->tanggal);
                $q->when(count($tanggal) == 1, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', Carbon::createFromFormat('d M, Y', $tanggal[0])->format('Y-m-d'));
                });
                $q->when(count($tanggal) == 2, function ($q) use ($tanggal) {
                    $q->where('tanggal_transaksi', '>=', Carbon::createFromFormat('d M, Y', $tanggal[0])->format('Y-m-d'))->where('tanggal_transaksi', '<=', Carbon::createFromFormat('d M, Y', $tanggal[1])->format('Y-m-d'));
                });
            })
            ->when($request->order, function ($q) use ($request) {
                // Default Order BY
                if ($request->order[0]['column'] == "0")
                    return  $q->orderBy('nomor_transaksi');

                switch ($request->order[0]['column']) {
                    case '2':
                        $order = 'nomor_transaksi';
                        break;
                    case '3':
                        $order = 'tanggal_transaksi';
                        break;
                    case '4':
                        $order = 'keterangan_kas';
                        break;
                    case '5':
                        $order = 'nominal';
                        break;
                    case '6':
                        $order = 'nominal_approve';
                        break;
                    default:
                        $order = 'nomor_transaksi';
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
            'users.pdf',
            [
                'name'  => 'Data Master Bank Cash',
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-Master-Bank-Cash-PDF');
    }
}
