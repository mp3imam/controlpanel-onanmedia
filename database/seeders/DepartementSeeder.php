<?php

namespace Database\Seeders;

use App\Models\DepartementModel;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Finance', 'kode' => '2'],
            ['nama' => 'Hrd', 'kode' => '3'],
            ['nama' => 'Costumer Services', 'kode' => '4'],
            ['nama' => 'Helpdesk', 'kode' => '5'],
            ['nama' => 'UI/UX', 'kode' => '7'],
            ['nama' => 'Kreatif', 'kode' => '8'],
            ['nama' => 'IT Network', 'kode' => '9'],
            ['nama' => 'IT Mobile', 'kode' => '10'],
            ['nama' => 'IT Web Dev', 'kode' => '11'],
        ];
        foreach ($data as $d) {
            DepartementModel::create($d);
        }
    }
}
