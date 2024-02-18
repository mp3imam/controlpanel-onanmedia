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
            ['nama'=>'Finance', 'kode' => 'Finance'],
            ['nama'=>'Direktur', 'kode' => 'Direktur'],
            ['nama'=>'Costumer Services', 'kode' => 'Costumer Services'],
            ['nama'=>'Helpdesk', 'kode' => 'Helpdesk'],
            ['nama'=>'UI/UX', 'kode' => 'UI/UX'],
            ['nama'=>'Marketing', 'kode' => 'Marketing'],
            ['nama'=>'IT', 'kode' => 'IT'],
            ['nama'=>'Kreatif', 'kode' => 'Kreatif'],
        ];
        foreach ($data as $d) {
            DepartementModel::create($d);
        }
    }
}
