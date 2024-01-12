<?php

namespace Database\Seeders;

use App\Models\BankModel;
use Illuminate\Database\Seeder;

class BankTunaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankModel::create([
            'nama' => 'Tunai Kas / Kasir',
            'kode' => 'Cash'
        ]);
    }
}
