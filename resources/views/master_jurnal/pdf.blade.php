<!DOCTYPE html>
<html>

<head>
    <title>Jurnal Umum PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="font-size:12px">
    <title>Jurnal Umum PDF</title>
    <style>
        footer .pagenum:after {
            content: counter(page);
        }
    </style>

    <footer style="position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px;">
        <div class="pagenum-container float-end" style="position: absolute; right: 0px; font-size: 12px"><span
                class="pagenum"></span></div>
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
        <table class="table fs-8" border="0" width="100%" style="margin-bottom: 50px;">
            <thead>
                <tr>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Transaksi</th>
                    <th style="text-align: center">Nama Akun</th>
                    <th style="text-align: center">Debit</th>
                    <th style="text-align: center">Kredit</th>
                    <th style="text-align: center">Keterangan</th>
                    <th style="text-align: center">Operasional</th>
                    <th style="text-align: center">PIC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    @foreach ($data->details as $detail => $d)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($data->tanggal_transaksi)->format('d-m-Y') }}</td>
                            <td>{{ $data->nomor_transaksi }}</td>
                            <td>
                                @if (
                                    ($data->sumber_data == 3 && $detail !== 1) ||
                                        ($data->sumber_data == 4 && $loop->last) ||
                                        ($data->sumber_data == 2 && $loop->last))
                                    {{ $d->jurnal_banks->nama }}
                                @elseif ($data->sumber_data == 5)
                                    @dd($d)
                                    {{ $d->jurnal_umums->uraian }}
                                @else
                                    {{ $d->coa_jurnal->uraian }}
                                @endif
                            </td>
                            <td style="text-align: right">{{ number_format($d->debet, 0) }}</td>
                            <td style="text-align: right">{{ number_format($d->kredit, 0) }}</td>
                            <td>{{ $data->keterangan_jurnal_umum }}</td>
                            <td>{{ $data->user_onan }}</td>
                            @php
                                $approve_finance = $data->approve_finance;
                                $transfer_finance = $data->transfer_finance;
                                $accept_finance = $data->accept_finance;
                                $usernames = [];

                                if ($approve_finance == $transfer_finance && $transfer_finance == $accept_finance) {
                                    // Semua data sama, tampilkan 1 username
                                    $usernames[] = $approve_finance; // Misalkan approve_finance adalah username
                                } elseif (
                                    $approve_finance == $transfer_finance ||
                                    $transfer_finance == $accept_finance ||
                                    $approve_finance == $accept_finance
                                ) {
                                    // Dua data sama, tampilkan 2 username
                                    if ($approve_finance == $transfer_finance) {
                                        $usernames[] = $approve_finance;
                                        $usernames[] = $accept_finance;
                                    } elseif ($transfer_finance == $accept_finance) {
                                        $usernames[] = $transfer_finance;
                                        $usernames[] = $approve_finance;
                                    } else {
                                        $usernames[] = $approve_finance;
                                        $usernames[] = $transfer_finance;
                                    }
                                } else {
                                    // Semua data berbeda, tampilkan semua username
                                    $usernames = [$approve_finance, $transfer_finance, $accept_finance];
                                }
                            @endphp
                            <td>
                                @foreach ($usernames as $username)
                                    {{ $username }}
                                    <br>
                                @endforeach
                            </td>
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
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">
                        {{ number_format($total[0]->jumlah_debet, 0) }}</th>
                    <td>Rp.</td>
                    <th style="color: white; background-color: #{{ $color }}; text-align: right">
                        {{ number_format($total[0]->jumlah_kredit, 0) }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div center><label class="align-center h3">Data Tidak ada</label></div>
    @endif
</body>

</html>
