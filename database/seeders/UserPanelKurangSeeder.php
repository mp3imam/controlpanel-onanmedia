<?php

namespace Database\Seeders;

use App\Models\DataKaryawanModel;
use Illuminate\Database\Seeder;

class UserPanelKurangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 12,
                'userId' => 12,
                'nama_lengkap' => 'Dandy',
                'nama_panggilan' => 'Dandy',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dandy@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 13,
                'userId' => 13,
                'nama_lengkap' => 'Imam',
                'nama_panggilan' => 'Imam',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'imam@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 14,
                'userId' => 14,
                'nama_lengkap' => 'Wahyu',
                'nama_panggilan' => 'Wahyu',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'wahyu@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 15,
                'userId' => 15,
                'nama_lengkap' => 'Anjani',
                'nama_panggilan' => 'Anjani',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'anjani@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 16,
                'userId' => 16,
                'nama_lengkap' => 'Elfira',
                'nama_panggilan' => 'Elfira',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'elfira@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ]
        ];

        // create data karyawan
        foreach ($data as $d) {
            DataKaryawanModel::create($d);
        }
    }
}