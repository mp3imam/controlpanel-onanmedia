<?php

namespace Database\Seeders;

use App\Models\JurnalUmumDetail;
use App\Models\MasterJurnal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterJurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurnal = MasterJurnal::create([
            "nomor_transaksi" => 1,
            "tanggal_transaksi" => "2023-12-21",
            "dokumen" => 1,
            "rekening" => 1,
            "uraian" => "uraian",
            "keterangan" => "keterangan",
            "jenis_mata_uang" => 1,
        ]);

        $jurnal_umum_details = [
            [
                "jurnal_umum_id" => $jurnal->id,
                "rekening" => 1,
                "keterangan" => "keterangan_1",
                "debet" => 0,
                "kredit" => 1,
            ],[
                "jurnal_umum_id" => $jurnal->id,
                "rekening" => 1,
                "keterangan" => "keterangan_2",
                "debet" => 1,
                "kredit" => 0,
            ],[
                "jurnal_umum_id" => $jurnal->id,
                "rekening" => 1,
                "keterangan" => "keterangan_3",
                "debet" => 0,
                "kredit" => 1,
            ]
        ];

        foreach ($jurnal_umum_details as $jud) {
            JurnalUmumDetail::create($jud);
        }

    }
}
