<!DOCTYPE html>
<html>
<head>
	<title>Jurnal Umum PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-size:12px">
    <title>Jurnal Umum PDF</title>

    <div class="mb-2 center text-center">
        <table style="width:100%">
            <tr>
                <td style="text-align: center">
                    <img src="{{ URL::asset('assets/images/logo/logo.webp') }}" alt="" height="100">
                    <br>
                    <label style="font-size: 12px">Jl. Mampang Prapatan IV No.29, Mampang Prpt., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790</label>
                </td>
            </tr>
        </table>
        <hr style="height:2px;border-width:1;color:black;background-color:black">

        <div>
            <div style="float: left">
                <h5>Laporan Jurnal Umum</h4>
            </div>
            <div style="float: right">
               Tanggal Cetak: {{ Date('d M Y') }}
            </div>
            <div style="clear:left"></div>
        </div>
    </div>
    @if (!$datas->isEmpty())
        <table class='table table-bordered' width="100%">
            <thead>
                <tr>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Nomor Transaksi</th>
                    <th style="text-align: center">Nama Akun</th>
                    <th style="text-align: center" colspan="2">Debit</th>
                    <th style="text-align: center" colspan="2">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    @foreach ($data->details as $d)
                        <tr>
                            <td>{{ $data->tanggal_transaksi }}</td>
                            <td>{{ $data->nomor_transaksi }}</td>
                            <td>{{ $d->coa_jurnal->uraian }}</td>
                            <td>Rp.</td>
                            <td style="text-align: right">{{ number_format($d->debet, 0); }}</td>
                            <td>Rp.</td>
                            <td style="text-align: right">{{ number_format($d->kredit, 0); }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: center" colspan="3">TOTAL</th>
                    <td>Rp.</td>
                    <th style="color: white; background-color: #4E36E2; text-align: right">{{ number_format($total[0]->jumlah_debet, 0); }}</th>
                    <td>Rp.</td>
                    <th style="color: white; background-color: #4E36E2; text-align: right">{{ number_format($total[0]->jumlah_kredit, 0); }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div center><label class="align-center h3">Data Tidak ada</label></div>
    @endif
</body>
</html>
