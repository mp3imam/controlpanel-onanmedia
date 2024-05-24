<?php

namespace App\Http\Controllers;

use App\Models\BankModel;
use App\Models\MasterCoaModel;
use App\Models\OrderJasaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
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
            ->addColumn('penjual', function ($row) {
                return $row->order->penjual->name . "<br>" . $row->order->penjual->phone;
            })
            ->addColumn('rekening_penjual', function ($row) {
                return $row->order->penjual->rekening ? $row->order->penjual->rekening[0]->rekening : "-";
            })
            ->addColumn('pembeli', function ($row) {
                return $row->order->pembeli->name . "<br>" . $row->order->pembeli->phone;
            })
            ->addColumn('status', function ($row) {
                return $row->order->aktifitas->nama;
            })
            ->addColumn('harga', function ($row) {
                return "Rp. " . number_format($row->order->totalPenawaran, 0, ',', '.');
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
        $validasi = [
            'pilih_data_id' => 'required',
            'kode_coa'      => 'required',
            'nama_akun'     => 'required',
            'rekening_bank' => 'required',
            'nama_bank'     => 'required',
        ];

        if ($request->pilih_data_id > 2) $validasi += ['kdrek1_coa_id' => 'required'];
        if ($request->pilih_data_id > 3) $validasi += ['kdrek2_coa_id' => 'required'];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        // Store your file into directory and db
        $input = $request->except(['_token', 'kode_coa', 'nama_akun', 'kdrek1_coa_id', 'kdrek2_coa_id', 'kdrek3_coa_id', 'pilih_data_id']);
        $input['id']     = MasterCoaModel::getMaxIdRecord()->first()->id + 1;
        $input['kdrek1'] = 0;
        $input['kdrek2'] = 0;
        $input['kdrek3'] = 0;

        if ($request->pilih_data_id > 1) $input['kdrek1'] = $request->kdrek1_coa_id;
        if ($request->pilih_data_id > 2) $input['kdrek2'] = $request->kdrek2_coa_id;
        if ($request->pilih_data_id > 3) $input['kdrek3'] = $request->kdrek3_coa_id ?? 0;

        $pilih_data = "D";
        if ($request->pilih_data_id == 1) $pilih_data = "H";
        if ($request->pilih_data_id == 2) $pilih_data = "S";
        if ($request->pilih_data_id == 3) $pilih_data = "C";

        if ($pilih_data == "D" && $request->kdrek1_coa_id == 1 && $request->kdrek2_coa_id == 1 && $request->kdrek3_coa_id == 1) {
            // insert to Banks
            $BankModel = BankModel::create([
                'nama'  => $request->nama_akun,
                'kode'  => $request->rekening_bank,
                'aktif' => 1,
                'icon'  => '-'
            ]);

            $input['akun_bank'] = $BankModel->id;
        }

        $input['kdrek']     = $request->kode_coa;
        $input['type']      = $pilih_data;
        $input['uraian']    = $request->nama_akun;
        $input['nama_bank'] = $request->nama_bank;
        $input['account_name']  = $request->nama_akun;
        $input['rekening_bank'] = $request->rekening_bank;

        MasterCoaModel::insert($input);

        return redirect('pembayaran_jasa');
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

        $detail = MasterCoaModel::findOrFail($id)->first();

        return view('pembayaran_jasa.detail', $title, compact(['detail']));
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

        $detail = MasterCoaModel::whereId($id)->first();
        $details = MasterCoaModel::with([
            'relasi_kdrek1',
            'relasi_kdrek2' => function ($query) use ($detail) {
                $query->whereKdrek1($detail->kdrek1);
            },
            'relasi_kdrek3' => function ($query) use ($detail) {
                $query->whereKdrek3($detail->kdrek3);
            }
        ])->whereId($id)->first();

        return view('pembayaran_jasa.edit', $title, compact(['details']));
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
            'nama_akun' => 'required',
            'kode_coa'  => 'required',
        ]);

        if ($request->pilih_data == "D" && $request->kdrek1_coa == 1 && $request->kdrek2_coa == 1 && $request->kdrek3_coa == 1) {
            // insert to Banks
            BankModel::whereId($request->akun_bank)->update([
                'nama'  => $request->nama_akun,
                'kode'  => $request->rekening_bank,
            ]);
        }

        // Store your file into directory and db
        $update = [
            'kdrek'         => $request->kode_coa,
            'uraian'        => $request->nama_akun,
            'rekening_bank' => $request->rekening_bank,
            'nama_bank'     => $request->nama_bank,
        ];
        MasterCoaModel::find($id)->update($update);

        return redirect('pembayaran_jasa');
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
            'status'  => Response::HTTP_BAD_REQUEST,
            'message' => MasterCoaModel::findOrFail($id)->delete()
        ]);
    }

    public function models($request)
    {
        return OrderJasaModel::with(['order.penjual.rekening', 'order.pembeli', 'order.aktifitas'])
            ->whereHas('order.aktifitas', fn ($q) => $q->where('id', 1007))
            ->when(auth()->user()->roles[0]->name == 'finance', fn ($q) => $q->where('approve_legal_id', 1))
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
                $q->whereHas('order', fn ($q) => $q->where('nama', 'ilike', '%' . $request->cari . "%")->orWhere('nomor', 'ilike', '%' . $request->cari . "%")->orWhere('totalPenawaran', 'ilike', '%' . $request->cari . "%")->orWhereHas('aktifitas', fn ($q) => $q->where('nama', 'ilike', '%' . $request->cari . "%")))
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