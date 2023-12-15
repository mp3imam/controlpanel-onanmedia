<?php

namespace Database\Seeders;

use App\Models\HelpdeskModel;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class HelpdeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HelpdeskModel::create([
            'jasa_id' => 'clm5zx4ig000cjneydvysqrsh',
            'order_id' => 'clm607oz50010jneyyb7kuhfk',
            'user_id' => 'clme9wnb9008ojneyrl98tp72',
            'nomor_keluhan' => 'OII/230905/TRX/0000134',
            'keluhan' => 'Seller ga ada kabar',
            'pesan' => 'Hi Onanmedia!
            Saya ingin mengajukan keluhan. saya memesan jasa pembuatan website di onanmedia, namun seller sampai saat ini tidak ada kabar. bagaimana solusinya? apa bisa melakukan refund? atau mungkin dialihkan ke seller lain saja.

            Luffy.',
            'status_helpdesk' => 1,
        ]);
    }
}
