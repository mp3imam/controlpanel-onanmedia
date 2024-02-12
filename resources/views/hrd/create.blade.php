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
                                <div class="col-md-12">
                                    <div class="card bg-transparent border-0">
                                        <img class="card-img rounded-circle" src="{{ asset('images/user-dummy-img.jpg') }}" width="50%" height="50%" alt="Card image">
                                        <div class="card-img-overlay p-0 d-flex flex-column">
                                            <div class="card-body bg-transparent"></div>
                                            <div class="bg-transparent text-end mb-3 ml-3">
                                                <button type="button" class="btn btn-icon waves-effect waves-light text-white" style="background-color: #4E36E2"><i class="ri-pencil-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 fs-24 text-center">
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
                                    <button type="button" class="btn btn-light waves-effect waves-light mx-2">Aktif</button>
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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-umum" role="tab" aria-selected="true">
                                        Umum
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Personal
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Pekerjaan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Keluarga
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Pendidikan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Pelatihan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                                        Riwayat Kerja
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-4">
                                <div class="tab-pane active" id="base-justified-umum" role="tabpanel">
                                    <!-- Konten untuk Isi Saldo Kasir -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="control-form">Nama</label>
                                            <input class="form-control" id="nama_user" name="nama_user">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-form">NIK</label>
                                            <input class="form-control" id="nama_user" name="nama_user">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-form">Nama</label>
                                            <input class="form-control" id="nama_user" name="nama_user">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-justified-product" role="tabpanel">
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
