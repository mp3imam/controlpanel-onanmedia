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
            ['id' => '2', 'nama' => 'Finance', 'kode' => '2'],
            ['id' => '3', 'nama' => 'Hrd', 'kode' => '3'],
            ['id' => '4', 'nama' => 'Costumer Services', 'kode' => '4'],
            ['id' => '5', 'nama' => 'Helpdesk', 'kode' => '5'],
            ['id' => '7', 'nama' => 'UI/UX', 'kode' => '7'],
            ['id' => '8', 'nama' => 'Kreatif', 'kode' => '8'],
            ['id' => '9', 'nama' => 'IT Network', 'kode' => '9'],
            ['id' => '10', 'nama' => 'IT Mobile', 'kode' => '10'],
            ['id' => '11', 'nama' => 'IT Web Dev', 'kode' => '11'],
        ];
        foreach ($data as $d) {
            DepartementModel::create($d);
        }
    }
}
