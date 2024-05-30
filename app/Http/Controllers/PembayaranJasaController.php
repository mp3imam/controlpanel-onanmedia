<?php

namespace App\Http\Controllers;

use App\Models\BankModel;
use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
use App\Models\MasterCoaModel;
use App\Models\MasterJurnal;
use App\Models\MasterJurnalFile;
use App\Models\OrderJasaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PembayaranJasaController extends Controller
{
    private $title = 'Pembayaran Jasa';
    private $li_1 = 'Index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(OrderJasaModel::with(['order.penjual.rekening.bank', 'order.pembeli', 'order.aktifitas', 'jasa'])->first());
        $this->middleware('permission:Pembayaran Jasa');
    }

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('pembayaran_jasa.index', $title);
    }

    function get_datatable(Request $request)
    {
        return DataTables::of($this->models($request))
            ->addColumn('tanggal', function ($row) {
                return Carbon::parse($row->order->createdAt)->format('d-m-Y');
            })
            ->addColumn('nomor_order', function ($row) {
                return $row->order->nomor;
            })
            ->addColumn('phone_pembeli', function ($row) {
                return $row->order->pembeli->phone;
            })
            ->addColumn('phone_penjual', function ($row) {
                return $row->order->penjual->phone;
            })
            ->addColumn('penjual', function ($row) {
                return $row->order->penjual->username;
            })
            ->addColumn('bank_public_penjual_id', function ($row) {
                return $row->order->penjual->rekening->msBankId;
            })
            ->addColumn('bank_public_penjual_nama', function ($row) {
                return $row->order->penjual->rekening->bank->nama;
            })
            ->addColumn('rekening_penjual', function ($row) {
                return $row->order->penjual->rekening ? $row->order->penjual->rekening->rekening : "-";
            })
            ->addColumn('pembeli', function ($row) {
                return $row->order->pembeli->username;
            })
            ->addColumn('slug', function ($row) {
                return $row->jasa->slug ?? '';
            })
            ->addColumn('status_jasa', function ($row) {
                return $row->jasa->msStatusJasaId;
            })
            ->addColumn('status', function ($row) {
                return $row->approveName == null && $row->financeName == null ? 'Validasi'
                    : ($row->approveName != null && $row->financeName != null ? 'Selesai'
                        : 'Pembayaran');
            })
            ->addColumn('harga', function ($row) {
                return "Rp. " . number_format($row->order->totalKomisiPenjual, 0, ',', '.');
            })
            ->rawColumns(['nomor_order', 'penjual', 'rekening_penjual', 'pembeli', 'status', 'harga'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        return view('pembayaran_jasa.create', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $message = '';
        // DB::beginTransaction();
        // try {
        $update = [
            'approveName' => $request->userName,
            'bankUserId' => $request->akun,
            'bankUserNama' => $request->akunNama,
        ];

        if ($request->userRole == 'finance') {
            $tahun = Carbon::now()->format('Y');
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';
            $total_nominal = intval(str_replace(',', '', str_replace(".", "", str_replace("Rp. ", "", $request->total_nominal))));

            $request['debet'] = $total_nominal;
            $request['kredit'] = $total_nominal;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_UPLOAD_BUKTI_JASA;
            $request['user_onan'] = $request->username;
            $request['approve_finance'] = auth()->user()->name;
            $request['transfer_finance'] = auth()->user()->name;
            $request['accept_finance'] = auth()->user()->name;
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;

            // Masukin gambar ke Jurnal Umum Detail
            $request['account_id'] = $request->akun;
            $request['debet'] = $total_nominal;
            $request['kredit'] = 0;
            $request['keterangan'] = $request->nama_item;
            JurnalUmumDetail::create($request->except('_token'));

            // Masukin gambar ke Jurnal Umum Detail
            $file = $request->file('foto_detail');
            $path = public_path('transaksi_onan/');
            $rand = rand(1000, 9999);
            $imageName = Carbon::now()->format('H:i:s') . "_$rand." . $file->extension();
            $file->move($path, $imageName);

            MasterJurnalFile::create([
                'jurnal_umum_id' => $masterJurnal->id,
                'path'           => asset('transaksi_onan/'),
                'filename'       => $imageName,
            ]);

            $update = [
                'financeName' => $request->userName,
                'fileUpload' => $path . $imageName,
            ];

            $request['keterangan'] = $request->keterangan_kas;
            $request['account_id'] = $request->akunBankOnanmedia;
            $request['debet'] = 0;
            $request['kredit'] = $total_nominal;
            JurnalUmumDetail::create($request->except('_token'));
        }

        $message = OrderJasaModel::whereId($request->id)->update($update);

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     DB::rollBack();

        //     return response()->json([
        //         'status'  => Response::HTTP_BAD_REQUEST,
        //         'message' => $th
        //     ]);
        // }
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $message
        ]);
    }

    public function models($request)
    {
        return OrderJasaModel::with(['order.penjual.rekening.bank', 'order.pembeli', 'order.aktifitas', 'jasa'])->when($request->cari_status, function ($q) use ($request) {
            $status = $request->cari_status;
            $q->when($status == 1, fn ($query) => $query->whereNotNull('approveName')->whereNull('financeName'))
                ->when($status == 2, fn ($query) => $query->whereNull('approveName'))
                ->when($status == 3, fn ($query) => $query->whereNotNull('financeName'));
        })
            ->whereHas('order.aktifitas', fn ($q) => $q->where('id', 1007))
            ->when($request->cari_tanggal, function ($q) use ($request) {
                $tanggal = explode(" to ", $request->cari_tanggal);
                $q->when(count($tanggal) == 1, function ($q) use ($tanggal) {
                    $q->whereDate('createdAt', Carbon::createFromFormat('d-m-Y', $tanggal[0])->format('Y-m-d'));
                });
                $q->when(count($tanggal) == 2, function ($q) use ($tanggal) {
                    $q->whereDate('createdAt', '>=', Carbon::createFromFormat('d-m-Y', $tanggal[0])->format('Y-m-d'))->whereDate('createdAt', '<=', Carbon::createFromFormat('d-m-Y', $tanggal[1])->addDays(1)->format('Y-m-d'));
                });
            })
            ->when($request->cari, function ($q) use ($request) {
                $q->whereHas('order', fn ($q) => $q->where('nama', 'ilike', '%' . $request->cari . "%")->orWhere('nomor', 'ilike', '%' . $request->cari . "%")->orWhere('totalKomisiPenjual', 'ilike', '%' . $request->cari . "%")->orWhereHas('aktifitas', fn ($q) => $q->where('nama', 'ilike', '%' . $request->cari . "%")))
                    ->orWhereHas('order.pembeli', fn ($q) => $q->where('name', 'ilike', '%' . $request->cari . "%"))
                    ->orWhereHas('order.penjual', fn ($q) => $q->where('name', 'ilike', '%' . $request->cari . "%")->orWhereHas('rekening', fn ($q) => $q->where('isMain', 1)->where('rekening', 'ilike', '%' . $request->cari . "%")));
            })
            ->get();
    }

    public function pdf(Request $request)
    {
        $datas = $this->models($request);
        $satker['name']     = "Kejati DKI Jakarta";
        $satker['address']  = "Jl. H. R. Rasuna Said No.2, RT.5/RW.4, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950";

        $pdf = Pdf::loadview(
            'users.pdf',
            [
                'name'  => 'Data Satker',
                'satker' => $satker,
                'datas' => $datas
            ]
        )->setPaper('F4');

        return $pdf->download('Laporan-users-PDF');
    }
}