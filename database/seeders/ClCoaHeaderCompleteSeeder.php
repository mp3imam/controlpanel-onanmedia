<?php

namespace Database\Seeders;

use App\Models\ClcoaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClCoaHeaderCompleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClcoaModel::insert([
            ['id'=>'148','kdrek1'=>'4','kdrek2'=>'1','kdrek3'=>'0','kdrek'=>'400','uraian'=>'Pendapatan usaha','type'=>'H'],
            ['id'=>'149','kdrek1'=>'4','kdrek2'=>'2','kdrek3'=>'0','kdrek'=>'800','uraian'=>'Pendapatan lain- lain','type'=>'H'],
            ['id'=>'150','kdrek1'=>'5','kdrek2'=>'0','kdrek3'=>'0','kdrek'=>'0','uraian'=>'beban beban ','type'=>'H'],
        ]);
    }
}
