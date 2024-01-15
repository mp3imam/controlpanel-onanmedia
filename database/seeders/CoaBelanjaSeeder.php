<?php

namespace Database\Seeders;

use App\Models\ClcoaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoaBelanjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClcoaModel::insert([
            ['id'=>'138','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'35','kdrek'=>'700.035','uraian'=>'Beban Desain','type'=>'D','jenis'=>1],
            ['id'=>'139','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'36','kdrek'=>'700.036','uraian'=>'Beban pembuatan aplikasi','type'=>'D','jenis'=>1],
            ['id'=>'140','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'37','kdrek'=>'700.037','uraian'=>'biaya pembelian peralatan kantor ','type'=>'D','jenis'=>1],
            ['id'=>'141','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'38','kdrek'=>'700.038','uraian'=>'beban kendaraan','type'=>'D','jenis'=>1],
            ['id'=>'142','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'39','kdrek'=>'700.039','uraian'=>'beban pembangunan','type'=>'D','jenis'=>1],
            ['id'=>'143','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'40','kdrek'=>'700.040','uraian'=>'beban interior','type'=>'D','jenis'=>1],
            ['id'=>'144','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'41','kdrek'=>'700.041','uraian'=>'beban pemasangan instalasi','type'=>'D','jenis'=>1],
            ['id'=>'145','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'42','kdrek'=>'700.042','uraian'=>'beban material','type'=>'D','jenis'=>1],
            ['id'=>'146','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'43','kdrek'=>'700.043','uraian'=>'beban listrik, air, & internet ( biaya internet digabungkan dengan listrik)','type'=>'D','jenis'=>1],
            ['id'=>'147','kdrek1'=>'5','kdrek2'=>'12','kdrek3'=>'44','kdrek'=>'700.044','uraian'=>'beban operasional','type'=>'D','jenis'=>1],
        ]);
    }
}
