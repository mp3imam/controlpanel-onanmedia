<?php

namespace Database\Seeders;

use App\Models\HelpdeskFileDetailModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpdeskFileDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HelpdeskFileDetailModel::create([
            'helpdesk_detail_id' => 1,
            'file_path' => 'https://image.jpnn.com/resize/570x380-80/arsip/normal/2021/09/01/tangkapan-layar-contoh-e-ktp-yang-sudah-diberi-watermark-fot-hxj6.jpg'
        ],[
            'helpdesk_detail_id' => 1,
            'file_path' => 'http://news.gunadarma.ac.id/wp-content/uploads/2019/01/17b6002b-774d-48a0-a359-398860fa91db_169.jpeg'
        ],[
            'helpdesk_detail_id' => 1,
            'file_path' => 'http://news.gunadarma.ac.id/wp-content/uploads/2019/01/bfe737a3-0c29-44a2-bb7f-14bbbd4827e2_169.jpeg'
        ]);
    }
}
