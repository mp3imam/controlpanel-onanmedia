<!DOCTYPE html>
<html>
<head>
	<title>Jurnal Umum PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-size:12px">
    <title>Jurnal Umum PDF</title>
    <style>
        footer .pagenum:after {
            content: counter(page);
        }
    </style>

    <footer style="position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px;">
    <table border="0" width="100%">
        <td>
            <label style="font-size: 8px">{{ Carbon\Carbon::now()->format('Y-M-d') }}</label>
        </td>
        <td>
            <label style="font-size: 8px">Jurnal Umum</label>
        </td>
        <td>
            <div class="pagenum-container" style="align-text: right; font-size: 8px">Page <span class="pagenum"></span></div>
        </td>
    </table>
    </footer>

    <div class="mb-2 center text-center" style="margin-top: 50px">
        <h4>Laporan Jurnal Umum</h4>
    </div>
    @if (!$datas->isEmpty())
        <table class='table table-bordered' border="0" width="100%" style="margin-bottom: 50px;">
            <thead>
                <tr>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Nomor Transaksi</th>
                    <th style="text-align: center">Nama Akun</th>
                    <th style="text-align: center" colspan="2">Debit</th>
                    <th style="text-align: center" colspan="2">Kredit</th>
                    <th style="text-align: center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    @foreach ($data->details as $detail => $d)
                        <tr>
                            <td>{{ $data->tanggal_transaksi }}</td>
                            <td>{{ $data->nomor_transaksi }}</td>
                            @if ($data->sumber_data == 2 && $detail == 0)
                                <td>{{ $d->jurnal_banks->nama }}</td>
                            @else
                                <td>{{ $d->coa_jurnal->uraian }}</td>
                            @endif
                            <td>Rp.</td>
                            <td style="text-align: right">{{ number_format($d->debet, 0); }}</td>
                            <td>Rp.</td>
                            <td style="text-align: right">{{ number_format($d->kredit, 0); }}</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: center" colspan="3">TOTAL</th>
                    <td>Rp.</td>
                    @php $color = $total[0]->jumlah_debet == $total[0]->jumlah_kredit ? '4E36E2' : 'FF0000'
                    @endphp
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">{{ number_format($total[0]->jumlah_debet, 0); }}</th>
                    <td>Rp.</td>
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">{{ number_format($total[0]->jumlah_kredit, 0); }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div center><label class="align-center h3">Data Tidak ada</label></div>
    @endif
</body>
</html>
