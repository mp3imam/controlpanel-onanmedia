<!DOCTYPE html>
<html>

<head>
    <title>{{ $name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="font-size:12px">
    <title>{{ $name }}</title>
    <style>
        footer .pagenum:after {
            content: counter(page);
        }
    </style>

    <footer style="position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px;">
        <div class="pagenum-container float-end" style="position: absolute; right: 0px; font-size: 12px"><span
                class="pagenum"></span></div>
    </footer>

    <div class="mb-2" style="margin-top: 50px">
        <table width="100%">
            <tr>
                <td width="70%">
                    <h4>Absensi Karyawan</h4>
                </td>
                <td width="30%" class="text-right font-weight-bold text-end">
                    Periode : {{ $periode }}
                </td>
            </tr>
        </table>
    </div>
    @if (!$datas->isEmpty())
        <table class='table mb-3' border="0" width="100%" style="margin-bottom: 50px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Jenis</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data => $d)
                    <tr>
                        <td width="5%">{{ $loop->iteration }}</td>
                        <td width="10%">{{ $d->user->nama_lengkap }}</td>
                        <td width="15%">{{ Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}</td>
                        <td width="15%">{{ Carbon\Carbon::parse($d->created_at)->format('H:i:s') }}</td>
                        <td width="10%">{{ $d->status }}</td>
                        <td width="10%">{{ $d->jenis_absen }}</td>
                        <td width="10%">
                            <img src="{{ public_path('storage/' . str_replace(asset('storage/'), '', $d->foto)) }}"
                                width="50px" height="50px" alt="Gambar">
                        </td>
                        <td width="10%">{{ $d->keterangan ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div center><label class="align-center h3">Data Kosong</label></div>
    @endif
    <hr>
    <h6>Karyawan Telat</h6>

    @if (!$telat->isEmpty())
        <table class='table' border="0" width="100%" style="margin-bottom: 50px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($telat as $tlt => $t)
                    <tr>
                        <td width="20%">{{ $loop->iteration }}</td>
                        <td width="20%">{{ $t->user->nama_lengkap }}</td>
                        <td width="10%">{{ $t->telat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div center><label class="align-center h3">Data Kosong</label></div>
    @endif
</body>

</html>
