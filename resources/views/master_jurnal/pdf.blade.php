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
        <div class="pagenum-container float-end" style="position: absolute; right: 0px; font-size: 12px"><span class="pagenum"></span></div>
    </footer>

    <div class="mb-2 center text-center" style="margin-top: 50px">
        <table width="100%">
            <tr>
                <td width="90%" class="text-center">
                    <h4>Laporan Jurnal Umum</h4>
                </td>
                <td width="10%" class="text-right font-weight-bold text-end">
                    {{ Carbon\Carbon::now()->format('d M Y') }}
                </td>
            </tr>
        </table>
    </div>
    @if (!$datas->isEmpty())
        <table class='table' border="0" width="100%" style="margin-bottom: 50px;">
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
                    <td>{{ Carbon\Carbon::parse($data->tanggal_transaksi)->format('d-m-Y') }}</td>
                    <td>{{ $data->nomor_transaksi }}</td>
                    <td>
                        @if ($data->sumber_data == 3 && $detail !== 1 || $data->sumber_data == 4 && $loop->last || $data->sumber_data == 2 && $loop->last)
                        {{ $d->jurnal_banks->nama }}
                        @else
                        {{ $d->coa_jurnal->uraian }}
                        @endif
                    </td>
                    <td>Rp.</td>
                    <td style="text-align: right">{{ number_format($d->debet, 0) }}</td>
                    <td>Rp.</td>
                    <td style="text-align: right">{{ number_format($d->kredit, 0) }}</td>
                    <td>{{ $data->keterangan_jurnal_umum }}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: center" colspan="3">TOTAL</th>
                    <td>Rp.</td>
                    @php
                    $color = $total[0]->jumlah_debet == $total[0]->jumlah_kredit ? '4E36E2' : 'FF0000';
                    @endphp
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">{{ number_format($total[0]->jumlah_debet, 0) }}</th>
                    <td>Rp.</td>
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">{{ number_format($total[0]->jumlah_kredit, 0) }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div center><label class="align-center h3">Data Tidak ada</label></div>
    @endif
</body>
</html>
