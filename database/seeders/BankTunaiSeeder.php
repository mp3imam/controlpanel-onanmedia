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
        BankModel::whereKode('Cash')->delete();
        BankModel::create([
            'nama' => 'Kas Tunai / Kasir',
            'kode' => 'Cash'
        ]);
    }
}
