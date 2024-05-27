<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BankModel;
use App\Models\JurnalUmumDetail;
use App\Models\MasterBankCashModel;
use App\Models\MasterJurnal;
use App\Models\MasterJurnalFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FinanceApiController extends Controller
{
    public function pemasukan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_transaksi' => 'required|unique:jurnals_umum,dokumen',
            'total_nominal' => 'required',
            'nama_bank' => 'required',
            'username' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        DB::beginTransaction();
        try {
            $tahun = Carbon::now()->format('Y');
            $model = MasterJurnal::withTrashed()->latest()->whereYear('created_at', $tahun)->first();
            $nomor = sprintf("%05s", $model !== null ? $model->id + 1 : 1);
            $request['tanggal_transaksi'] = Carbon::now()->format('Y-m-d');
            $request['dokumen'] = $request->nomor_transaksi;
            $request['nomor_transaksi'] = "$nomor/JUR/$tahun";
            $request['keterangan_kas'] = $request->keterangan_kas ?? '-';
            $total_nominal = intval(str_replace(',', '', $request->total_nominal));
            $request['debet'] = $total_nominal;
            $request['kredit'] = $total_nominal;
            $request['sumber_data'] = MasterBankCashModel::KATEGORY_KAS_PENGEMBALIAN;
            $request['user_onan'] = $request->username;
            $request['approve_finance'] = 'System';
            $request['transfer_finance'] = 'System';
            $request['accept_finance'] = 'System';
            $masterJurnal = MasterJurnal::create($request->except('_token'));
            $request['jurnal_umum_id'] = $masterJurnal->id;
            $bank_id = BankModel::where('nama', 'ilike', '%' . $request->nama_bank . '%')->first()->id;
            $request['account_id'] = $bank_id;
            $request['debet'] = $total_nominal;
            $request['kredit'] = 0;
            JurnalUmumDetail::create($request->except('_token'));
            $request['account_id'] = $bank_id;
            $request['kredit'] = $total_nominal;
            $request['debet'] = 0;
            JurnalUmumDetail::create($request->except('_token'));

            // Masukin gambar ke Jurnal Umum Detail
            if ($request->foto_detail != null)
                MasterJurnalFile::create([
                    'jurnal_umum_id' => $masterJurnal->id,
                    'path'           => asset('kas_belanja/'),
                    'filename'       => str_replace(asset('kas_belanja/') . "/", '', $request->foto_detail),
                ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Transaksi Kas Berhasil',
                'data' => $masterJurnal
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }
    }
}
