<!DOCTYPE html>
<html>
<head>
	<title>{{ $name }} PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-size:12px">
    <title>{{ $name }} PDF</title>

    <div class="mb-2 center text-center">
        @include('header_pdf')
    </div>

    @if (!$datas->isEmpty())
        <table class='table table-bordered' style="width:100%">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th width="20%">Satker</th>
                    <th width="20%">Kode</th>
                    <th width="30%">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->kode_satker }}</td>
                    <td>{{ $d->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div center><label class="align-center h3">Data Tidak ada</label></div>
    @endif
</body>
</html>
