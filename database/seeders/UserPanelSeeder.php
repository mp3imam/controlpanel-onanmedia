<?php

namespace Database\Seeders;

use App\Models\DataKaryawanModel;
use Illuminate\Database\Seeder;

class UserPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'userId' => 1,
                'nama_lengkap' => 'Administrator',
                'nama_panggilan' => 'admin',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'admin@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 2,
                'userId' => 2,
                'nama_lengkap' => 'Amalina',
                'nama_panggilan' => 'Lina',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Perempuan',
                'email' => 'amalina@onanmedia.com',
                'no_handphone' => '+68',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 3,
                'userId' => 3,
                'nama_lengkap' => 'Fauzan Diwa',
                'nama_panggilan' => 'Fauzan',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'fauzan@onanmedia.com',
                'no_handphone' => '+628',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 4,
                'userId' => 4,
                'nama_lengkap' => 'Customer Service',
                'nama_panggilan' => 'CS',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'cs@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 5,
                'userId' => 5,
                'nama_lengkap' => 'Adian Sahrida',
                'nama_panggilan' => 'Adian',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Perempuan',
                'email' => 'adian@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 6,
                'userId' => 6,
                'nama_lengkap' => 'Dolok Biantara Siregar',
                'nama_panggilan' => 'Dolok',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 7,
                'userId' => 7,
                'nama_lengkap' => 'Lana',
                'nama_panggilan' => 'Lana',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 8,
                'userId' => 8,
                'nama_lengkap' => 'Fikri',
                'nama_panggilan' => 'Fikri',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 9,
                'userId' => 9,
                'nama_lengkap' => 'Ariq',
                'nama_panggilan' => 'Ariq',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 10,
                'userId' => 10,
                'nama_lengkap' => 'Fernosa',
                'nama_panggilan' => 'Fernosa',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
                'no_handphone' => '+62811131400',
                'alamat_ktp' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'alamat_domisili' => 'Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790',
                'pendidikan_terakhir' => '7',
                'foto' => 'https://controlpanel-onanmedia.test/karyawan/foto/11:25:16_2913.png'
            ],
            [
                'id' => 11,
                'userId' => 11,
                'nama_lengkap' => 'Warih',
                'nama_panggilan' => 'Warih',
                'nik_khusus' => '',
                'agama_id' => 1,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-07-28',
                'jenis_kelamin' =>  'Laki-Laki',
                'email' => 'dolok@onanmedia.com',
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