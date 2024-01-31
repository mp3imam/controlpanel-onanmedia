<?php

namespace Database\Seeders;

use App\Models\SatuanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Buah', 'slug' => 'pcs'],
            ['nama' => 'Paket', 'slug' => 'pk'],
            ['nama' => 'Dus', 'slug' => 'dus'],
            ['nama' => 'Karton', 'slug' => 'ctn'],
            ['nama' => 'Roll', 'slug' => 'roll'],
            ['nama' => 'Botol', 'slug' => 'bot'],
            ['nama' => 'Tabung', 'slug' => 'tub'],
            ['nama' => 'Liter', 'slug' => 'l'],
            ['nama' => 'Meter', 'slug' => 'm'],
            ['nama' => 'Sentimeter', 'slug' => 'cm'],
            ['nama' => 'Gram', 'slug' => 'g'],
            ['nama' => 'Kilogram', 'slug' => 'kg'],
            ['nama' => 'Ton', 'slug' => 't'],
            ['nama' => 'Dos', 'slug' => 'dos'],
            ['nama' => 'Potong', 'slug' => 'ptg'],
            ['nama' => 'Bungkus', 'slug' => 'bks'],
            ['nama' => 'Kotak', 'slug' => 'kot'],
            ['nama' => 'Unit', 'slug' => 'unit'],
            ['nama' => 'Set', 'slug' => 'set'],
            ['nama' => 'Lembar', 'slug' => 'lem'],
            ['nama' => 'Galon', 'slug' => 'gal'],
            ['nama' => 'Porsi', 'slug' => 'porsi'],
            ['nama' => 'Kardus', 'slug' => 'kard'],
            ['nama' => 'Tas', 'slug' => 'tas'],
            ['nama' => 'Butir', 'slug' => 'bt'],
            ['nama' => 'Sak', 'slug' => 'sak'],
            ['nama' => 'Rol', 'slug' => 'rol'],
            ['nama' => 'Tray', 'slug' => 'tray'],
            ['nama' => 'Meter persegi', 'slug' => 'm²'],
            ['nama' => 'Meter kubik', 'slug' => 'm³'],
            ['nama' => 'Kardus kecil', 'slug' => 'kart'],
            ['nama' => 'Toples', 'slug' => 'topl'],
            ['nama' => 'Batang', 'slug' => 'bat'],
            ['nama' => 'Keping', 'slug' => 'kpg'],
            ['nama' => 'Pack', 'slug' => 'pack'],
            ['nama' => 'Box', 'slug' => 'box'],
            ['nama' => 'Kaos', 'slug' => 'kaos'],
            ['nama' => 'Dosis', 'slug' => 'dosis'],
            ['nama' => 'Deker', 'slug' => 'deker'],
            ['nama' => 'Lembaran', 'slug' => 'lbr'],
            ['nama' => 'Galeri', 'slug' => 'glr'],
            ['nama' => 'Belas', 'slug' => 'bls'],
            ['nama' => 'Rantai', 'slug' => 'ran'],
            ['nama' => 'Kaset', 'slug' => 'kaset'],
            ['nama' => 'Lapis', 'slug' => 'lapis'],
            ['nama' => 'Cangkir', 'slug' => 'cpg'],
            ['nama' => 'Pisau', 'slug' => 'pns'],
            ['nama' => 'Kardus besar', 'slug' => 'krt'],
            ['nama' => 'Cangkir', 'slug' => 'cgr'],
            ['nama' => 'Kit', 'slug' => 'kit'],
            ['nama' => 'Blok', 'slug' => 'blk'],
            ['nama' => 'Kavling', 'slug' => 'kav'],
            ['nama' => 'Silinder', 'slug' => 'sil'],
            ['nama' => 'Pita', 'slug' => 'pta'],
            ['nama' => 'Helai', 'slug' => 'hl'],
            ['nama' => 'Susu', 'slug' => 'sus'],
            ['nama' => 'Dosis', 'slug' => 'dosis'],
            ['nama' => 'Kepingan', 'slug' => 'kpn'],
            ['nama' => 'Lot', 'slug' => 'lot'],
            ['nama' => 'Rol besar', 'slug' => 'rb'],
            ['nama' => 'Dosis', 'slug' => 'dosis'],
            ['nama' => 'Kaleng', 'slug' => 'kln'],
            ['nama' => 'Gelas', 'slug' => 'gls'],
            ['nama' => 'Kotak besar', 'slug' => 'kbt'],
            ['nama' => 'Keranjang', 'slug' => 'krj'],
            ['nama' => 'Kumparan', 'slug' => 'kmp'],
            ['nama' => 'Sisir', 'slug' => 'sir'],
            ['nama' => 'Bungkus besar', 'slug' => 'bkbs'],
            ['nama' => 'Hiasan', 'slug' => 'hsn'],
            ['nama' => 'Setengah dos', 'slug' => 'sdos'],
            ['nama' => 'Dua dos', 'slug' => '2dos'],
            ['nama' => 'Kerucut', 'slug' => 'krc'],
            ['nama' => 'Bagian', 'slug' => 'bgn'],
            ['nama' => 'Paket besar', 'slug' => 'pkbs'],
            ['nama' => 'Dus kecil', 'slug' => 'dusk'],
            ['nama' => 'Rantang', 'slug' => 'rntg'],
            ['nama' => 'Ransel', 'slug' => 'rsl'],
            ['nama' => 'Lap', 'slug' => 'lap'],
            ['nama' => 'Kuas', 'slug' => 'ks'],
            ['nama' => 'Baki', 'slug' => 'bki'],
            ['nama' => 'Setengah liter', 'slug' => '½l'],
            ['nama' => 'Meter panjang', 'slug' => 'mp'],
            ['nama' => 'Meter persegi', 'slug' => 'm²'],
            ['nama' => 'Dus besar', 'slug' => 'dusb'],
            ['nama' => 'Kepingan', 'slug' => 'kp'],
            ['nama' => 'Piring', 'slug' => 'prg'],
            ['nama' => 'Mesin', 'slug' => 'msn'],
            ['nama' => 'Boks', 'slug' => 'bks'],
            ['nama' => 'Mesin', 'slug' => 'msn'],
            ['nama' => 'Meja', 'slug' => 'mja'],
            ['nama' => 'Rokok', 'slug' => 'rok'],
            ['nama' => 'Setangkai', 'slug' => 'st'],
            ['nama' => 'Dus kecil', 'slug' => 'dk'],
            ['nama' => 'Lot besar', 'slug' => 'lotb'],
            ['nama' => 'Dus besar', 'slug' => 'dusb'],
            ['nama' => 'Dus kecil', 'slug' => 'dusk'],
            ['nama' => 'Tas besar', 'slug' => 'tasb'],
            ['nama' => 'Tas kecil', 'slug' => 'task'],
            ['nama' => 'Alat', 'slug' => 'alt'],
            ['nama' => 'Kereta', 'slug' => 'krt']
        ];

        foreach ($data as $item) {
            SatuanModel::create($item);
        }
    }
}
