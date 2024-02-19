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
                                <div class="col-md-12 fs-24 text-center nama_lengkap">
                                    <input type="file" id="foto_umum" name="foto_umum" hidden/>
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
                                        <div id="alert_nama_lengkap_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Lengkap</label>
                                            <input id="id_update" hidden>
                                            <input class="form-control" id="nama_lengkap_umum" name="nama_lengkap_umum">
                                        </div>
                                        <div id="alert_nama_panggilan_umum" class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Panggilan</label>
                                            <input class="form-control" id="nama_panggilan_umum" name="nama_panggilan_umum">
                                        </div>
                                        <div id="alert_alamat_ktp_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Alamat KTP</label>
                                            <textarea class="form-control" id='alamat_ktp_umum' name="alamat_ktp"></textarea>
                                        </div>
                                        <div id="alert_alamat_domisili_umum" class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Alamat Domisili</label>
                                            <textarea class="form-control" id='alamat_domisili_umum' name="alamat_domisili"></textarea>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NIK Khusus (optional)</label>
                                            <input class="form-control" id="nik_khusus_umum" name="nik_khusus">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Agama</label>
                                            <select class="form-control" id='agama_id_umum' name="agama_id"></select>
                                        </div>
                                        <div id="alert_tempat_lahir_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tempat</label>
                                            <input class="form-control" id="tempat_lahir_umum" name="tempat">
                                        </div>
                                        <div id="alert_tanggal_lahir_umum" class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir_umum" name="tanggal_lahir">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Jenis Kelamin</label>
                                            <select class="form-control" id='jenis_kelamin_umum' name="jenis_kelamin">
                                                <option value="1" selected>Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div id="alert_no_handphone_umum" class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">No. Handphone</label>
                                            <input class="form-control" id="no_hp_umum" name="no_hp">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Email</label>
                                            <input class="form-control" id="email_umum" name="email">
                                        </div>
                                        <div id="alert_pendidikan_terakhir_umum" class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Pendidikan Terakhir</label>
                                            <select class="form-control" id='pendidikan_id_umum' name="pendidikan_id"></select>
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_umum" class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-personal" role="tabpanel">
                                    <div class="row">
                                        <div id="alert_no_identitas_personal" class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Identitas (KTP)</label>
                                            <input type="number" class="form-control" id="no_identitas_personal" name="no_identitas">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NPWP</label>
                                            <input type="number" class="form-control" id="NPWP_personal" name="NPWP">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tipe Pajak</label>
                                            <select class="form-control" id='tipe_pajak_personal' name="tipe_pajak"></select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tunjangan Pajak</label>
                                            <select class="form-control" id='tunjangan_pajak_personal' name="tunjangan_pajak_personal">
                                                <option value="iya" selected>Yes</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tunjangan Pajak dalam %</label>
                                            <input type="number" class="form-control" id="tunjangan_pajak_dalam_persen_personal" name="tunjangan_pajak_dalam_persen_personal">
                                        </div>
                                        <div id="alert_nama_bank_personal" class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Bank</label>
                                            <select class="form-control" id='nama_bank_personal' name="nama_bank_personal"></select>
                                        </div>
                                        <div id="alert_no_akun_bank_personal" class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Akun Bank</label>
                                            <input class="form-control" id="no_akun_bank_personal" name="no_akun_bank">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Kartu Asuransi Ketenagakerjaan</label>
                                            <input class="form-control" id="no_ketenagakerjaan_personal" name="no_ketenagakerjaan">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Kartu Asuransi Kesehatan</label>
                                            <input class="form-control" id="no_kesehatan_personal" name="no_kesehatan">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_personal" disabled class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-pekerjaan" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Cabang</label>
                                            <select class="form-control" id='cabang_pekerjaan' name="cabang_pekerjaan">
                                                <option value="1" selected>1. Kantor Pusat</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Departement</label>
                                            <select class="form-control" id='departement_pekerjaan' name="departement_pekerjaan">
                                                <option value="1" selected>1. HRD</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Jabatan</label>
                                            <select class="form-control" id='jabatan_pekerjaan' name="jabatan_pekerjaan"></select>
                                        </div>
                                        <div class="col-lg-12 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Cost Center</label>
                                            <select class="form-control" id='cost_center_pekerjaan' name="cost_center_pekerjaan">
                                                <option value="1" selected>1. General</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Kontrak Selesai</label>
                                            <input type="date" class="form-control" id="kontrak_selesai" name="kontrak_selesai" value="{{ Carbon\Carbon::now()->addMonth(3)->format('Y-m-d') }}">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Status</label>
                                            <select class="form-control" id='status_kontrak' name="status_kontrak">
                                                <option value="1" selected>Kontrak</option>
                                                <option value="2">Permanen</option>
                                                <option value="3">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Periode Kontrak</label>
                                            <select class="form-control" id='periode_kontrak' name="periode_kontrak">
                                                <option value="1" selected>3 Bulan</option>
                                                <option value="2">6 Bulan</option>
                                                <option value="3">9 Bulan</option>
                                                <option value="4">1 Tahun</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Potongan Terlambat</label>
                                            <input class="form-control" id="potongan_terlambat" name="potongan_terlambat">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Toleransi Keterlambatan (menit)</label>
                                            <input class="form-control" id="toleransi_keterlambatan" name="toleransi_keterlambatan">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Absen diluar kantor</label>
                                            <select class="form-control" id='absen_diluar_kantor' name="absen_diluar_kantor">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Iya</option>
                                            </select>
                                            </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_pekerjaan" disabled class="btn text-white float-end" style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-keluarga" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_keluarga" name="tanggal_keluarga" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_keluarga" name="cari_keluarga" class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" class="btn btn-success waves-effect waves-light mt-4 float-end tambah_keluarga"><i class="ri-add-line"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableKeluarga" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Tanggal Lahir</th>
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
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_pendidikan" name="tanggal_pendidikan" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_pendidikan" name="cari_pendidikan" class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" class="btn btn-success waves-effect waves-light mt-4 float-end tambah_pendidikan"><i class="ri-add-line"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTablePendidikan" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Tanggal Lahir</th>
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
                                <div class="tab-pane" id="base-pelatihan" role="tabpanel">
                                    <!-- Konten untuk Pengembalian Kas -->
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_pelatihan" name="tanggal_pelatihan" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_pelatihan" name="cari_pelatihan" class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" class="btn btn-success waves-effect waves-light mt-4 float-end tambah_pelatihan"><i class="ri-add-line"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTablePelatihan" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Tanggal Lahir</th>
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
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter Tanggal</label>
                                                    <input class="form-control flatpickr-input" id="tanggal_riwayat" name="tanggal_riwayat" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal')) }}">
                                                </div>
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_riwayat" name="cari_riwayat" class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" class="btn btn-success waves-effect waves-light mt-4 float-end tambah_riwayat"><i class="ri-add-line"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Tabel untuk menampilkan data -->
                                                <table id="dataTableRiwayat" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Tanggal Lahir</th>
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
            $('#agama_id_umum').append(newOptionRole).trigger('change');
            $('#agama_id_umum').select2();

            $('#agama_id_umum').select2({
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
            $('#pendidikan_id_umum').append(newOptionRole).trigger('change');
            $('#pendidikan_id_umum').select2();

            $('#pendidikan_id_umum').select2({
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


            var dataRole = {id: 2,text: "Kawin dengan 1 Tanggungan",selected: true};
            var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
            $('#tipe_pajak_personal').append(newOptionRole).trigger('change');
            $('#tipe_pajak_personal').select2();

            $('#tipe_pajak_personal').select2({
                ajax: {
                    url: "{{ route('api.tipe_pajak') }}",
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

            var dataRole = {id: 8,text: "Bank Bca",selected: true};
            var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
            $('#nama_bank_personal').append(newOptionRole).trigger('change');
            $('#nama_bank_personal').select2();

            $('#nama_bank_personal').select2({
                ajax: {
                    url: "{{ route('api.get_select2_banks') }}",
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

            $('#jabatan_pekerjaan').select2({
                ajax: {
                    url: "{{ route('api.divisi') }}",
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#save_umum').click(function(){
            var fd = new FormData()
            fd.append('nama_lengkap_umum', $('#nama_lengkap_umum').val())
            fd.append('nama_panggilan_umum', $('#nama_panggilan_umum').val())
            fd.append('alamat_ktp_umum', $('#alamat_ktp_umum').val())
            fd.append('alamat_domisili_umum', $('#alamat_domisili_umum').val())
            fd.append('nik_khusus_umum', $('#nik_khusus_umum').val())
            fd.append('agama_id_umum', $('#agama_id_umum').val())
            fd.append('tempat_lahir_umum', $('#tempat_lahir_umum').val())
            fd.append('tanggal_lahir_umum', $('#tanggal_lahir_umum').val())
            fd.append('jenis_kelamin_umum', $('#jenis_kelamin_umum').find('option:selected').text())
            fd.append('no_hp_umum', $('#no_hp_umum').val())
            fd.append('email_umum', $('#email_umum').val())
            fd.append('pendidikan_id_umum', $('#pendidikan_id_umum').val())
            if ($('#foto_umum')[0].files.length !== 0)
            fd.append('foto_umum', $('#foto_umum').val())
            $.ajax({
                type:'post',
                url: "{{ route('simpan_karyawan_umum') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200){
                        $('#id_update').val(response.message.id)
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link').addClass('active');
                        $('#save_umum').text('Update')
                        console.log(response.message.nama_lengkap);
                        $('.nama_lengkap').text(response.message.nama_lengkap)
                        Swal.fire({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success"
                        });
                        $('#save_personal').prop('disabled', false)
                    }else{
                        $('.alert_hapus').remove()
                        if (response.message.nama_lengkap_umum)
                            $('#alert_nama_lengkap_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.nama_panggilan_umum)
                            $('#alert_nama_panggilan_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.alamat_ktp_umum)
                            $('#alert_alamat_ktp_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.alamat_domisili_umum)
                            $('#alert_alamat_domisili_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.tempat_lahir_umum)
                            $('#alert_tempat_lahir_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.tanggal_lahir_umum)
                            $('#alert_tanggal_lahir_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.no_handphone_umum)
                            $('#alert_no_handphone_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.pendidikan_terakhir_umum)
                            $('#alert_pendidikan_terakhir_umum').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                            Swal.fire({
                                title: "Error!",
                                text: "Cek kembali data yang anda masukan!",
                                icon: "error"
                            });
                    }
                }
            });

        });

        $('#save_personal').click(function(){
            var fd = new FormData()
            fd.append('id_update', $('#id_update').val())
            fd.append('no_identitas_personal', $('#no_identitas_personal').val())
            fd.append('NPWP_personal', $('#NPWP_personal').val())
            fd.append('tipe_pajak_personal', $('#tipe_pajak_personal').val())
            fd.append('tunjangan_pajak_personal', $('#tunjangan_pajak_personal').val())
            fd.append('tunjangan_pajak_dalam_persen_personal', $('#tunjangan_pajak_dalam_persen_personal').val())
            fd.append('nama_bank_personal', $('#nama_bank_personal').val())
            fd.append('no_akun_bank_personal', $('#no_akun_bank_personal').val())
            fd.append('no_ketenagakerjaan_personal', $('#no_ketenagakerjaan_personal').val())
            fd.append('no_kesehatan_personal', $('#no_kesehatan_personal').val())
            $.ajax({
                type:'post',
                url: "{{ route('simpan_karyawan_personal') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200){
                        $('#id_update').val(response.message.id)
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link').addClass('active');
                        $('#save_pekerjaan').prop('disabled', false)
                        Swal.fire({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success"
                        });
                    }else{
                        $('.alert_hapus').remove()
                        if (response.message.no_identitas_personal)
                            $('#alert_no_identitas_personal').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.nama_bank_personal)
                            $('#alert_nama_bank_personal').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                            Swal.fire({
                                title: "Error!",
                                text: "Cek kembali data yang anda masukan!",
                                icon: "error"
                            });
                    }
                }
            });

        });

        $('#save_pekerjaan').click(function(){
            var fd = new FormData()
            fd.append('id_update', $('#id_update').val())
            fd.append('cabang_pekerjaan', $('#cabang_pekerjaan').val())
            fd.append('departement_pekerjaan', $('#departement_pekerjaan').val())
            fd.append('jabatan_pekerjaan', $('#jabatan_pekerjaan').val())
            fd.append('cost_center_pekerjaan', $('#cost_center_pekerjaan').val())
            fd.append('tanggal_masuk', $('#tanggal_masuk').val())
            fd.append('kontrak_selesai', $('#kontrak_selesai').val())
            fd.append('status_kontrak', $('#status_kontrak').val())
            fd.append('periode_kontrak', $('#periode_kontrak').val())
            fd.append('potongan_terlambat', $('#potongan_terlambat').val())
            fd.append('toleransi_keterlambatan', $('#toleransi_keterlambatan').val())
            $.ajax({
                type:'post',
                url: "{{ route('simpan_karyawan_pekerjaan') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200){
                        $('#id_update').val(response.message.id)
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link').addClass('active');
                        $('#save_pekerjaan').prop('disabled', false)
                        Swal.fire({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success"
                        });
                    }else{
                        $('.alert_hapus').remove()
                        if (response.message.cabang_pekerjaan)
                            $('#alert_cabang_pekerjaan').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.departement_pekerjaan)
                            $('#alert_departement_pekerjaan').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.jabatan_pekerjaan)
                            $('#alert_jabatan_pekerjaan').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.cost_center_pekerjaan)
                            $('#alert_cost_center_pekerjaan').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.tanggal_masuk)
                            $('#alert_tanggal_masuk').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.kontrak_selesai)
                            $('#alert_kontrak_selesai').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.status_kontrak)
                            $('#alert_status_kontrak').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.periode_kontrak)
                            $('#alert_periode_kontrak').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.potongan_terlambat)
                            $('#alert_potongan_terlambat').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)
                        if (response.message.toleransi_keterlambatan)
                            $('#alert_toleransi_keterlambatan').append(`<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`)












                            Swal.fire({
                                title: "Error!",
                                text: "Cek kembali data yang anda masukan!",
                                icon: "error"
                            });
                    }
                }
            });

        });









</script>
@endsection
