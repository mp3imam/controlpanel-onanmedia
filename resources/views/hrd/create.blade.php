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
                    <form action="{{ route('data_karyawan.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-4">
                            <label for="nik" class="form-label">NIK</label>
                            <input id="nik" name="nik" class="form-control"
                                placeholder="Masukan Nik Karyawan" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="ktp" class="form-label">KTP</label>
                            <input id="ktp" name="ktp" class="form-control"
                                placeholder="Masukan KTP" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input id="npwp" name="npwp" class="form-control"
                                placeholder="Masukan NPWP" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input id="nama" name="nama" class="form-control"
                                placeholder="Masukan Nama Karyawan" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" class="form-control"
                                placeholder="Masukan Email" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <div class="mt-4 mt-lg-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked="" name="inlineRadioOptions2" id="inlineRadio">
                                    <label class="form-check-label" for="inlineRadio">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio">
                                    <label class="form-check-label" for="inlineRadio">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input id="no_telepon" name="no_telepon" class="form-control"
                                placeholder="Masukan Nama no_telepon" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="upload_ktp" class="form-label">Upload Foto KTP</label>
                            <input type="file" id="upload_ktp" name="upload_ktp" class="form-control"
                                placeholder="Masukan Nama Satker" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="provinsi_id" class="form-label">Provinsi</label>
                            <select id='provinsi_id' name="provinsi_id" multiple="multiple"></select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="satker" class="form-label">Satker</label>
                            <input id="satker" name="satker" class="form-control"
                                placeholder="Masukan Nama Satker" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="kode_satker" class="form-label">Kode</label>
                            <input id="kode_satker" name="kode_satker" class="form-control"
                                placeholder="Masukan Kode Satker" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="address" class="form-label">Alamat</label>
                            <input id="address" name="address" class="form-control" placeholder="Masukan Alamat" />
                        </div>
                        <button class="btn btn-success form-control"><i
                                class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan</button>
                    </form>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
