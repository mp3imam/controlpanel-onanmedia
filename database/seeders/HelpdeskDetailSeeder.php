<?php

namespace Database\Seeders;

use App\Models\HelpdeskDetailModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpdeskDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HelpdeskDetailModel::create([
            'helpdesk_id' => 1,
            'user_id' => 'clmya82i90084jn5wayxxa3sb',
            'description' => 'Baik akan kami hubungin kontak seller, mohon ditunggu 1 x 24 jam. Terima kasih',
        ],[
            'helpdesk_id' => 1,
            'user_id' => 'clm5ykvva002sjnpt622cixhk',
            'description' => 'Mohon Maaf saya sedang banyak kerjaan, akan saya kirim datanya',
        ],[
            'helpdesk_id' => 1,
            'user_id' => 'clm5yi6x3002pjnptetjvlf9q',
            'description' => 'baik saya tunggu secepatnya',
        ]);
    }
}
