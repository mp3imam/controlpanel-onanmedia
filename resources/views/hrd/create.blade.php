@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    @include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $title }}</h4>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12 btn" onclick="$('#inputField').click()">
                                    <div class="card bg-transparent border-0">
                                        <img class="card-img rounded-circle" src="{{ asset('images/user-dummy-img.jpg') }}" width="50%" height="50%" alt="Card image"  for="files">
                                        <div class="card-img-overlay p-0 d-flex flex-column">
                                            <div class="card-body bg-transparent"></div>
                                            <div class="bg-transparent text-end mb-3 ml-3">
                                                <button type="button" for="files" class="btn btn-icon waves-effect waves-light text-white" style="background-color: #4E36E2"><i class="ri-pencil-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 fs-24 text-center">
                                    <input type="file" id="inputField" hidden/>
                                    -
                                </div>
                                <div class="col-md-12 fs-22 text-muted text-center">
                                    -
                                </div>
                                <div class="col-md-12 text-center my-4">
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light rounded-5" style="background-color: #4E36E2"><i class="ri-phone-fill"></i></button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light mx-4 rounded-5" style="background-color: #4E36E2"><i class="ri-mail-fill"></i></button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light rounded-5" style="background-color: #4E36E2"><i class="ri-linkedin-box-fill"></i></button>
                                </div>
                                <div class="col-md-12">
                                    Status
                                </div>
                                <div class="col-md-12 text-center my-4">
                                    <button type="button" class="btn btn-success waves-effect waves-light mx-2">Aktif</button>
                                    <button type="button" class="btn btn-light waves-effect waves-light mx-2">Tidak Aktif</button>
                                </div>
                                <div class="col-md-12 mb-4">
                                    Sisa Kontrak
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light" style="background-color: #4B5563">00</button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light mx-4" style="background-color: #4B5563">00</button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light" style="background-color: #4B5563">00</button>
                                </div>
                                <div class="col-md-12 text-center fs-10 text-muted">
                                    <label class="mx-3">Tahun</label>
                                    <label class="mx-3">Bulan</label>
                                    <label class="mx-4">Hari</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <ul class="nav nav-tabs nav-justified nav-border-bottom animation-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#base-umum" role="tab" aria-selected="true">
                                        Umum
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-personal" role="tab" aria-selected="false">
                                        Personal
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pekerjaan" role="tab" aria-selected="false">
                                        Pekerjaan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-keluarga" role="tab" aria-selected="false">
                                        Keluarga
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pendidikan" role="tab" aria-selected="false">
                                        Pendidikan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pendidikan" role="tab" aria-selected="false">
                                        Pelatihan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-riwayat" role="tab" aria-selected="false">
                                        Riwayat Kerja
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-4">
                                <div class="tab-pane active" id="base-umum" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama</label>
                                            <input class="form-control" id="nama_user" name="nama_user">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NIK Khusus (optional)</label>
                                            <input class="form-control" id="nik_khusus" name="nik_khusus">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Agama</label>
                                            <select class="form-control" id='agama_id' name="agama_id"></select>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tempat</label>
                                            <input class="form-control" id="tempat" name="tempat">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Lahir</label>
                                            <input type="text" class="form-control flatpickr-input" id="tanggal_lahir" name="tanggal_lahir" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Jenis Kelamin</label>
                                            <select class="form-control" id='jenis_kelamin' name="jenis_kelamin">
                                                <option value="1" selected>Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">No. Handphone</label>
                                            <input class="form-control" id="no_hp" name="no_hp">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Email</label>
                                            <input class="form-control" id="email" name="email">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Pendidikan Terakhir</label>
                                            <select class="form-control" id='pendidikan_id' name="pendidikan_id"></select>
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_umum" class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-personal" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Identitas (KTP)</label>
                                            <input class="form-control" id="no_identitas" name="no_identitas">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NPWP</label>
                                            <input class="form-control" id="NPWP" name="NPWP">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tipe Pajak</label>
                                            <select class="form-control" id='tipe_pajak' name="tipe_pajak"></select>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tunjangan Pajak dalam %</label>
                                            <input class="form-control" id="tunjangan_pajak" name="tunjangan_pajak">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Bank</label>
                                            <input class="form-control" id="nama_bank" name="nama_bank">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Akun Bank</label>
                                            <input class="form-control" id="no_akun_bank" name="no_akun_bank">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Kartu Asuransi Ketenagakerjaan</label>
                                            <input class="form-control" id="no_ketenagakerjaan" name="no_ketenagakerjaan">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_personal" class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-pekerjaan" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Divisi</label>
                                            <input class="form-control" id="divisi" name="divisi">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Masuk</label>
                                            <input type="text" class="form-control flatpickr-input" id="tanggal_masuk" name="tanggal_masuk" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Kontrak Selesai</label>
                                            <input type="text" class="form-control flatpickr-input" id="kontrak_selesai" name="kontrak_selesai" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Status</label>
                                            <input class="form-control" id="status_kontrak" name="status_kontrak">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Periode Kontrak</label>
                                            <input class="form-control" id="periode_kontrak" name="periode_kontrak">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Potongan Terlambat</label>
                                            <input class="form-control" id="potongan_terlambat" name="potongan_terlambat">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Toleransi Keterlambatan (menit)</label>
                                            <input class="form-control" id="toleransi_keterlambatan" name="toleransi_keterlambatan">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_personal" class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>                                </div>
                                <div class="tab-pane" id="base-keluarga" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <a href="{{ route('master_return_bank_cash.create') }}" type="button" class="btn btn-success my-2">
                                            Tambah
                                        </a>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_return" name="tanggal_return" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_return" name="cari_return" value="{{ old('cari_return', Request::get('cari_return')) }}"
                                                    class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md-3 p-3 text-center mt-4">
                                                    <button type="reset" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-repeat-2-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableReturn" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No. Transaksi</th>
                                                            <th>Tanggal Transaksi</th>
                                                            <th>Sumber</th>
                                                            <th>Tujuan</th>
                                                            <th>Jenis Transaksi</th>
                                                            <th>Nominal</th>
                                                            <th>Keterangan</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-pendidikan" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <a href="{{ route('master_return_bank_cash.create') }}" type="button" class="btn btn-success my-2">
                                            Tambah
                                        </a>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_return" name="tanggal_return" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_return" name="cari_return" value="{{ old('cari_return', Request::get('cari_return')) }}"
                                                    class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md-3 p-3 text-center mt-4">
                                                    <button type="reset" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-repeat-2-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableReturn" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No. Transaksi</th>
                                                            <th>Tanggal Transaksi</th>
                                                            <th>Sumber</th>
                                                            <th>Tujuan</th>
                                                            <th>Jenis Transaksi</th>
                                                            <th>Nominal</th>
                                                            <th>Keterangan</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-pendidikan" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <a href="{{ route('master_return_bank_cash.create') }}" type="button" class="btn btn-success my-2">
                                            Tambah
                                        </a>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_return" name="tanggal_return" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_return" name="cari_return" value="{{ old('cari_return', Request::get('cari_return')) }}"
                                                    class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md-3 p-3 text-center mt-4">
                                                    <button type="reset" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-repeat-2-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableReturn" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No. Transaksi</th>
                                                            <th>Tanggal Transaksi</th>
                                                            <th>Sumber</th>
                                                            <th>Tujuan</th>
                                                            <th>Jenis Transaksi</th>
                                                            <th>Nominal</th>
                                                            <th>Keterangan</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-riwayat" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <a href="{{ route('master_return_bank_cash.create') }}" type="button" class="btn btn-success my-2">
                                            Tambah
                                        </a>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_return" name="tanggal_return" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_return" name="cari_return" value="{{ old('cari_return', Request::get('cari_return')) }}"
                                                    class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md-3 p-3 text-center mt-4">
                                                    <button type="reset" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-repeat-2-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableReturn" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No. Transaksi</th>
                                                            <th>Tanggal Transaksi</th>
                                                            <th>Sumber</th>
                                                            <th>Tujuan</th>
                                                            <th>Jenis Transaksi</th>
                                                            <th>Nominal</th>
                                                            <th>Keterangan</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            var dataRole = {id: 1,text: "Islam",selected: true};
            var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
            $('#agama_id').append(newOptionRole).trigger('change');
            $('#agama_id').select2();

            $('#agama_id').select2({
                ajax: {
                    url: "{{ route('api.agama') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            var dataRole = {id: 20230505000065,text: "S1",selected: true};
            var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
            $('#pendidikan_id').append(newOptionRole).trigger('change');
            $('#pendidikan_id').select2();

            $('#pendidikan_id').select2({
                ajax: {
                    url: "{{ route('api.pendidikan') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });

        //
        $('#save_umum').click(function(){
            var activeTab = $('.tab-pane.active');
            activeTab.removeClass('show active');
            activeTab.removeClass('active');
            activeTab.next('.tab-link').addClass('active');
            activeTab.next('.tab-pane').addClass('show active');
            activeTab.next('li.nav-item').find('.nav-link').tab('show');
        });
    </script>
@endsection
