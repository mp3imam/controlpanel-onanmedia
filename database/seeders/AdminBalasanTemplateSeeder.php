<?php

namespace Database\Seeders;

use App\Helpers\IdStringRandom;
use App\Models\AdminBalasanTemplateModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminBalasanTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminBalasanTemplateModel::create([
            [
                'id' => IdStringRandom::stringRandom(),
                'judul' => 'Halo Malam',
                'isi' => 'Halo, Selamat Malam. Terima kasih telah menghubungi Onanmedia, pihak Admin akan segera menghubungi.
                Harap bersabar.',
                'isAktif' => 1,
            ],[
                'id' => IdStringRandom::stringRandom(),
                'judul' => 'Maaf',
                'isi' => 'Maaf atas ketidaknyaman nya!',
                'isAktif' => 1,
            ],[
                'id' => IdStringRandom::stringRandom(),
                'judul' => 'Baik',
                'isi' => 'Baik',
                'isAktif' => 1,
            ],[
                'id' => IdStringRandom::stringRandom(),
                'judul' => 'Terima Kasih',
                'isi' => 'Terima Kasih',
                'isAktif' => 1,
            ]
        ]);
    }
}
