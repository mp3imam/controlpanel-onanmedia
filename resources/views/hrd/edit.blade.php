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

                <div class="modal fade modal-xl" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                    aria-modal="true" role="dialog" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" id="modal_content">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12" onclick="$('#foto_umum').click()">
                                    <div class="card bg-transparent border-0">
                                        <label for="file-input" class="custom-file-upload cursor-pointer">
                                            @if ($detail->foto != null)
                                                <img class="card-img rounded-circle" id="foto_umum_data"
                                                    src="{{ $detail->foto }}" width="100px" height="200px"
                                                    alt="Card image">
                                            @else
                                                <img class="card-img rounded-circle" id="foto_umum_data"
                                                    src="{{ asset('images/user-dummy-img.jpg') }}" width="100px"
                                                    height="200px" alt="Card image">
                                            @endif
                                            <div class="card-img-overlay p-0 d-flex flex-column">
                                                <div class="card-body bg-transparent"></div>
                                                <div class="bg-transparent text-end m-4">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light text-white rounded-5"
                                                        style="background-color: #4E36E2">
                                                        <i class="ri-pencil-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <input type="file" id="foto_umum" name="foto_umum" accept="image/*" hidden />
                                <div class="col-md-12 fs-24 text-center nama_lengkap">
                                    {{ $detail->nama_lengkap }}
                                </div>
                                <div class="col-md-12 fs-22 text-muted text-center divisi_lengkap">
                                    {{ $detail->pekerjaan ? $detail->pekerjaan->departement->nama : '' }}
                                </div>
                                <div class="col-md-12 text-center my-4">
                                    <a target="_blank" href="https://wa.me/{{ $detail->no_handphone }}"
                                        class="btn text-white btn-icon waves-effect waves-light rounded-5"
                                        style="background-color: #4E36E2"><i class="ri-phone-fill"></i></a>
                                    <a target="_blank"
                                        href="https://mail.google.com/mail/u/0/?fs=1&to={{ $detail->email }}&su=HRD Onanmedia&body=BODY&cc=biantara@onanmedia.com;finance@onanmedia.com&tf=cm"
                                        class="btn text-white btn-icon waves-effect waves-light mx-4 rounded-5"
                                        style="background-color: #4E36E2"><i class="ri-mail-fill"></i></a>
                                    <a target="_blank" href="https://www.linkedin.com/in/{{ $detail->linkedin }}"
                                        class="btn text-white btn-icon waves-effect waves-light rounded-5"
                                        style="background-color: #4E36E2"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                                <div class="col-md-12">
                                    Status
                                </div>
                                <div class="col-md-12 text-center my-4">
                                    <button type="button"
                                        class="btn btn-success waves-effect waves-light mx-2 karyawan_status_aktif"
                                        onclick="status_karyawan(1)">Aktif</button>
                                    <button type="button"
                                        class="btn btn-light waves-effect waves-light mx-2 karyawan_status_tidak_aktif"
                                        onclick="status_karyawan(0)">Tidak
                                        Aktif</button>
                                </div>
                                <div class="col-md-12 mb-4">
                                    Sisa Kontrak
                                </div>
                                @php

                                @endphp
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light"
                                        style="background-color: #4B5563" id="kontrak_tahun">0{{ $sisa_tahun }}</button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light mx-4"
                                        style="background-color: #4B5563" id="kontrak_bulan">{{ $sisa_bulan }}</button>
                                    <button type="button" class="btn text-white btn-icon waves-effect waves-light"
                                        style="background-color: #4B5563" id="kontrak_hari">{{ $sisa_hari }}</button>
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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#base-umum" role="tab"
                                        aria-selected="true">
                                        Umum
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-personal" role="tab"
                                        aria-selected="false">
                                        Personal
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pekerjaan" role="tab"
                                        aria-selected="false">
                                        Pekerjaan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-keluarga" role="tab"
                                        aria-selected="false">
                                        Keluarga
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pendidikan" role="tab"
                                        aria-selected="false">
                                        Pendidikan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-pelatihan" role="tab"
                                        aria-selected="false">
                                        Pelatihan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-riwayat" role="tab"
                                        aria-selected="false">
                                        Riwayat Kerja
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-4">
                                <div class="tab-pane active" id="base-umum" role="tabpanel">
                                    <div class="row">
                                        <div id="alert_nama_lengkap_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Lengkap</label>
                                            <input id="id_update" value="{{ $detail->id }}" hidden>
                                            <input class="form-control" id="nama_lengkap_umum" name="nama_lengkap_umum"
                                                value="{{ $detail->nama_lengkap }}">
                                        </div>
                                        <div id="alert_nama_panggilan_umum" class="col-lg p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Panggilan</label>
                                            <input class="form-control" id="nama_panggilan_umum"
                                                name="nama_panggilan_umum" value="{{ $detail->nama_panggilan }}">
                                        </div>
                                        <div id="alert_alamat_ktp_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Alamat KTP</label>
                                            <textarea class="form-control" id='alamat_ktp_umum' name="alamat_ktp">{{ $detail->alamat_ktp }}</textarea>
                                        </div>
                                        <div id="alert_alamat_domisili_umum" class="col-lg p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Alamat Domisili</label>
                                            <textarea class="form-control" id='alamat_domisili_umum' name="alamat_domisili">{{ $detail->alamat_domisili }}</textarea>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NIK Khusus (optional)</label>
                                            <input class="form-control" id="nik_khusus_umum" name="nik_khusus"
                                                value="{{ $detail->nik_khusus }}">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Agama</label>
                                            <select class="form-control" id='agama_id_umum' name="agama_id"></select>
                                        </div>
                                        <div id="alert_tempat_lahir_umum" class="col-lg-6 p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tempat Lahir</label>
                                            <input class="form-control" id="tempat_lahir_umum" name="tempat"
                                                value="{{ $detail->tempat_lahir }}">
                                        </div>
                                        <div id="alert_tanggal_lahir_umum" class="col-lg p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir_umum"
                                                name="tanggal_lahir" value="{{ $detail->tanggal_lahir }}">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Jenis Kelamin</label>
                                            <select class="form-control" id='jenis_kelamin_umum' name="jenis_kelamin">
                                                <option value="1"
                                                    value="{{ $detail->jenis_kelamin == 1 ? 'selected' : '' }}">Laki-Laki
                                                </option>
                                                <option value="2"
                                                    value="{{ $detail->jenis_kelamin == 2 ? 'selected' : '' }}">Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div id="alert_no_handphone_umum" class="col-lg p-2 mb-3 mx-1 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">No. Handphone</label>
                                            <input class="form-control" id="no_hp_umum" name="no_hp"
                                                value="{{ $detail->no_handphone }}">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Email</label>
                                            <input class="form-control" id="email_umum" name="email"
                                                value="{{ $detail->email }}">
                                        </div>
                                        <div id="alert_pendidikan_terakhir_umum" class="col-lg-12 p-2 mb-3 mx-1 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Pendidikan Terakhir</label>
                                            <select class="form-control" id='pendidikan_id_umum'
                                                name="pendidikan_id"></select>
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_umum" class="btn text-white float-end"
                                                style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-personal" role="tabpanel">
                                    <div class="row">
                                        <div id="alert_no_identitas_personal" class="col-lg-6 p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Identitas (KTP)</label>
                                            <input type="number" class="form-control" id="no_identitas_personal"
                                                name="no_identitas" value="{{ $detail->personal ? $detail->personal->no_ktp : '' }}">
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">NPWP</label>
                                            <input type="number" class="form-control" id="NPWP_personal" name="NPWP"
                                                value="{{ $detail->personal ? $detail->personal->no_npwp : '' }}">
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tipe Pajak</label>
                                            <select class="form-control" id='tipe_pajak_personal'
                                                name="tipe_pajak"></select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tunjangan Pajak</label>
                                            <select class="form-control" id='tunjangan_pajak_personal'
                                                name="tunjangan_pajak_personal">
                                                <option value="iya"
                                                    {{ $detail->personal ? $detail->personal->tunjangan_pajak == 'iya' ? 'selected' : '' : '' }}>Yes
                                                </option>
                                                <option value="tidak"
                                                    {{ $detail->personal ? $detail->personal->tunjangan_pajak == 'tidak' ? 'selected' : '' : '' }}>
                                                    Tidak</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tunjangan Pajak dalam %</label>
                                            <input type="number" class="form-control"
                                                id="tunjangan_pajak_dalam_persen_personal"
                                                value="{{ $detail->personal ? $detail->personal->tunjangan_pajak_dalam_persen : '' }}"
                                                name="tunjangan_pajak_dalam_persen_personal">
                                        </div>
                                        <div id="alert_nama_bank_personal" class="col-lg-6 p-2 mx-1 mb-3 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nama Bank</label>
                                            <select class="form-control" id='nama_bank_personal'
                                                name="nama_bank_personal"></select>
                                        </div>
                                        <div id="alert_no_akun_bank_personal" class="col-lg p-2 mb-3 mx-1 rounded-3"
                                            style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Akun Bank</label>
                                            <input class="form-control" id="no_akun_bank_personal" name="no_akun_bank">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Kartu Asuransi
                                                Ketenagakerjaan</label>
                                            <input class="form-control" id="no_ketenagakerjaan_personal"
                                                value="{{ $detail->personal ? $detail->personal->no_ketenagakerjaan : '' }}"
                                                name="no_ketenagakerjaan">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Nomor Kartu Asuransi Kesehatan</label>
                                            <input class="form-control" id="no_kesehatan_personal" name="no_kesehatan"
                                                value="{{ $detail->personal ? $detail->personal->no_kesehatan : '' }}">
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            @if ($detail->personal)
                                                @if ($detail->personal->foto_ktp !== null)
                                                    <div>
                                                        <img id="preview_ktp" class="img-fluid"
                                                            onclick="openModal('{{ $detail->personal->foto_ktp }}')"
                                                            src="{{ $detail->personal->foto_ktp }}" alt="preview"
                                                            width="200px" height="200px" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalgrid" />
                                                    </div>
                                                @endif
                                            @endif
                                            <label class="control-form text-muted">Upload KTP</label>
                                            <input type="file" class="form-control" id="no_ktp" name="no_ktp"
                                                accept="image/*">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            @if ($detail->personal)
                                                @if ($detail->personal->foto_kk !== null)
                                                    <div>
                                                        <img id="preview_ktp" class="img-fluid"
                                                            onclick="openModal('{{ $detail->personal->foto_kk }}')"
                                                            src="{{ $detail->personal->foto_kk }}" alt="preview"
                                                            width="200px" height="200px" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalgrid" />
                                                    </div>
                                                @endif
                                            @endif
                                            <label class="control-form text-muted">Upload Kartu Keluarga</label>
                                            <input type="file" class="form-control" id="no_kartu_keluarga"
                                                name="no_kartu_keluarga" accept="image/*">
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_personal" class="btn text-white float-end"
                                                style="background-color: #4E36E2">Simpan</button>
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
                                            <select class="form-control" id='departement_pekerjaan'
                                                name="departement_pekerjaan">
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Jabatan</label>
                                            <select class="form-control" id='jabatan_pekerjaan' name="jabatan_pekerjaan">
                                                <option value="1"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->departement_id == 1 ? 'selected' : '' : '' }}>1.
                                                    Manager</option>
                                                <option value="2"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->departement_id == 2 ? 'selected' : '' : '' }}>2.
                                                    Leader</option>
                                                <option value="3"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->departement_id == 3 ? 'selected' : '' : '' }}>3. Staf
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Status</label>
                                            <select class="form-control" id='status_kontrak' name="status_kontrak">
                                                <option value="1"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->status_kontrak == 1 ? 'selected' : '' : '' }}>Kontrak
                                                </option>
                                                <option value="2"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->status_kontrak == 2 ? 'selected' : '' : '' }}>
                                                    Permanen</option>
                                                <option value="3"
                                                    {{ $detail->pekerjaan ? $detail->pekerjaan->status_kontrak == 3 ? 'selected' : '' : '' }}>Lainnya
                                                </option>
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
                                        <div class="col-lg-6 p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="kontrak_masuk"
                                                name="kontrak_masuk" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                readonly>
                                        </div>
                                        <div class="col-lg p-2 mx-1 mb-3 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Kontrak Selesai</label>
                                            <input type="date" class="form-control" id="kontrak_selesai"
                                                name="kontrak_selesai"
                                                value="{{ Carbon\Carbon::now()->addMonth(3)->format('Y-m-d') }}" readonly>
                                        </div>
                                        <div class="col-lg-6 p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Potongan Terlambat</label>
                                            <select class="form-control" id='potongan_terlambat'
                                                name="potongan_terlambat">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Iya</option>
                                            </select>
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Toleransi Keterlambatan (menit)</label>
                                            <input type="number" min="1" max="30" class="form-control"
                                                id="toleransi_keterlambatan" name="toleransi_keterlambatan">
                                        </div>
                                        <div class="col-lg p-2 mb-3 mx-1 rounded-3" style="background-color: #F9FAFB">
                                            <label class="control-form text-muted">Absen diluar kantor</label>
                                            <select class="form-control" id='absen_diluar_kantor'
                                                name="absen_diluar_kantor">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Iya</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 p-2 mb-3 mx-1">
                                            <button id="save_pekerjaan" class="btn text-white float-end"
                                                style="background-color: #4E36E2">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-keluarga" role="tabpanel">
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_keluarga" name="cari_keluarga" class="form-control"
                                                        placeholder="Cari semua data"
                                                        aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" id="tambah_keluarga"
                                                        class="btn btn-success waves-effect waves-light mt-4 float-end tambah_keluarga"
                                                        onclick="modal_crud_keluarga('Tambah')" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalgrid"><i class="ri-add-line"></i>
                                                        Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="dataTableKeluarga" class="table table-striped w-100 h-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th width="20%">Nama</th>
                                                            <th hidden>hubungan_id</th>
                                                            <th>Hubungan</th>
                                                            <th hidden>Agama_id</th>
                                                            <th>Agama</th>
                                                            <th>Pekerjaan</th>
                                                            <th>Alamat</th>
                                                            <th>Usia</th>
                                                            <th>Hanphone</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th width="5%">Action</th>
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
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_pendidikan" name="cari_pendidikan"
                                                        class="form-control" placeholder="Cari semua data"
                                                        aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" id="tambah_pendidikan"
                                                        class="btn btn-success waves-effect waves-light mt-4 float-end tambah_pendidikan"
                                                        onclick="modal_crud_pendidikan('Tambah')" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalgrid"><i class="ri-add-line"></i>
                                                        Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="dataTablePendidikan" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jurusan</th>
                                                            <th>IPK</th>
                                                            <th>Alamat</th>
                                                            <th>Tanggal Masuk</th>
                                                            <th>Tanggal Keluar</th>
                                                            <th>Setifikat</th>
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
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_pelatihan" name="cari_pelatihan" class="form-control"
                                                        placeholder="Cari semua data"
                                                        aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" id="tambah_pelatihan"
                                                        class="btn btn-success waves-effect waves-light mt-4 float-end tambah_pelatihan"
                                                        onclick="modal_crud_pelatihan('Tambah')" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalgrid"><i class="ri-add-line"></i>
                                                        Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="dataTablePelatihan" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Periode</th>
                                                            <th>Sertifikat</th>
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
                                    <div class="col-lg-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-3 p-3">
                                                    <label>Filter All</label>
                                                    <input id="cari_riwayat" name="cari_riwayat" class="form-control"
                                                        placeholder="Cari semua data"
                                                        aria-label="Amount (to the nearest dollar)">
                                                </div>
                                                <div class="col-md p-3 text-center">
                                                    <button type="button" id="tambah_riwayat"
                                                        class="btn btn-success waves-effect waves-light mt-4 float-end tambah_riwayat"
                                                        onclick="modal_crud_riwayat('Tambah')" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalgrid"><i class="ri-add-line"></i>
                                                        Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="dataTableRiwayat" class="table table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Jabatan</th>
                                                            <th>Tanggal Masuk</th>
                                                            <th>Tanggal Keluar</th>
                                                            <th>Deskripsi</th>
                                                            <th>Alasan</th>
                                                            <th>Sertifikat</th>
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
        function openModal(img) {
            $('#modal_content').html(`
            <div class="modal-body text-center">
                <img src="${img}" alt="Gambar" class="img-fluid">
            </div>
        `)
        }

        function status_karyawan(params) {
            $.ajax({
                type: "post",
                url: "{{ route('simpan.karyawan.status') }}",
                data: {
                    status: params,
                    id: $('#id_update').val()
                },
                success: function(response) {
                    if (params == 1) {
                        $('.karyawan_status_aktif').removeClass('btn-light').addClass('btn-success');
                        $('.karyawan_status_tidak_aktif').removeClass('btn-success').addClass('btn-light');
                    } else {
                        $('.karyawan_status_aktif').removeClass('btn-success').addClass('btn-light');
                        $('.karyawan_status_tidak_aktif').removeClass('btn-light').addClass('btn-danger');
                    }
                    Swal.fire({
                        title: "Sukses!",
                        text: "Status Berhasil Di Simpan",
                        icon: "success",
                        timer: 1000
                    });
                }
            });
        }

        function modal_crud_keluarga(data, id, nama, hubungan_id, hubungan, agama_id, agama, pekerjaan, alamat,
            nomor_handphone, tanggal_lahir) {
            var nama_modal = nama ?? ''
            var hubungan_id_modal = hubungan_id ?? ''
            var hubungan_modal = hubungan ?? ''
            var agama_id_modal = agama_id ?? ''
            var agama_modal = agama ?? ''
            var pekerjaan_modal = pekerjaan ?? ''
            var alamat_modal = alamat ?? ''
            var nomor_handphone_modal = nomor_handphone ?? ''
            var tanggal_lahir_modal = tanggal_lahir ?? ''

            $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-xxl-6" id="modal_nama_append">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" id="modal_id" value="${id}" hidden>
                        <input class="form-control" id="modal_nama" placeholder="Masukan Nama" value="${nama_modal}">
                    </div>
                    <div class="col-xxl-6" id="modal_hubungan_append">
                        <label for="hubungan" class="form-label">Hubungan</label>
                        <select class="form-control" id="modal_hubungan">
                            <option value="1" selected >Ayah</option>
                            <option value="2">Ibu</option>
                            <option value="3">Suami/Istri</option>
                            <option value="4">Saudara</option>
                            <option value="5">Anak</option>
                        </select>
                    </div>
                    <div class="col-xxl-6" id="modal_agama_append">
                        <label for="agama" class="form-label">Agama</label>
                        <select id="modal_agama_id" class="form-control"></select>
                    </div>
                    <div class="col-xxl-6" id="modal_no_hp_append">
                        <label for="no_hp" class="form-label">Nomor Hanphone</label>
                        <input type="number" class="form-control" id="modal_no_hp" placeholder="Masukan Nomor Handphone" value="${nomor_handphone_modal}">
                    </div>
                    <div class="col-xxl-6" id="modal_pekerjaan_append">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input class="form-control" id="modal_pekerjaan" placeholder="Masukan Pekerjaan" value="${pekerjaan_modal}">
                    </div>
                    <div class="col-xxl-6" id="modal_tanggal_lahir_append">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="modal_tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="${tanggal_lahir_modal}">
                    </div>
                    <div class="col-xxl-12" id="modal_alamat_append">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="modal_alamat" placeholder="Masukan Alamat">${alamat_modal}</textarea>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>&nbsp;
                        <button type="submit" class="btn btn-primary add float-end" id="row` + id + `">Simpan</button>
                    </div>
                </div>
            </div>
        `)

            if (id !== undefined) {
                var dataRole = {
                    id: agama_id_modal,
                    text: agama_modal,
                    selected: true
                };
                var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
                $('#modal_agama_id').append(newOptionRole).trigger('change');
                $('#modal_agama_id').select2();

                $('#row' + id).removeClass('btn-primary').addClass('btn-warning').text('Update');
            } else {
                var dataRole = {
                    id: 1,
                    text: 'Islam',
                    selected: true
                };
                var newOptionRole = new Option(dataRole.text, dataRole.id, false, false);
                $('#modal_agama_id').append(newOptionRole).trigger('change');
                $('#modal_agama_id').select2();

                $('#row' + id).removeClass('btn-warning').addClass('btn-primary');
            }

            $("#modal_agama_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.agama') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        };
                    }
                },
                dropdownParent: $("#modal_content")
            });

            $('#modal_agama_id').change(function() {
                $("#nama_agama").val($("#modal_agama_id option:selected").text());
            });
            $("#nama_agama").val($("#modal_agama_id option:selected").text());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add').on('click', function() {
                var data = new FormData()
                data.append('id', $('#modal_id').val())
                data.append('id_update', $('#id_update').val())
                data.append('nama', $('#modal_nama').val())
                data.append('agama_id', $('#modal_agama_id').val())
                data.append('no_hp', $('#modal_no_hp').val())
                data.append('hubungan', $('#modal_hubungan').val())
                data.append('pekerjaan', $('#modal_pekerjaan').val())
                data.append('tanggal_lahir', $('#modal_tanggal_lahir').val())
                data.append('alamat', $('#modal_alamat').val())
                $.ajax({
                    type: "post",
                    url: "{{ route('simpan.karyawan.keluarga') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == 200) {
                            Swal.fire({
                                title: 'Add!',
                                text: 'Your file has been add.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTableKeluarga').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.alert_hapus').remove()
                            if (result.message.nama == "The nama field is required.")
                                $('#modal_nama_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (result.message.tanggal_lahir == "The tanggal lahir field is required.")
                                $('#modal_tanggal_lahir_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (result.message.alamat == "The alamat field is required.")
                                $('#modal_alamat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (result.message.no_hp == "The no hp field is required.")
                                $('#modal_no_hp_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (result.message.pekerjaan == "The pekerjaan field is required.")
                                $('#modal_pekerjaan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });
            })
        }

        // ('Edit','`+row.data+`', '`+row.jurusan+`','`+row.IPK+`', '`+row.alamat+`', '`+row.tahun_masuk+`', '`+row.tahun_keluar+`', '`+row.sertifikat+`')
        function modal_crud_pendidikan(data, id, nama, jurusan, IPK, alamat, tahun_masuk, tahun_keluar, sertifikat) {
            var nama_modal = nama ?? ''
            var jurusan_modal = jurusan ?? ''
            var IPK_modal = IPK ?? ''
            var alamat_modal = alamat ?? ''
            var tahun_masuk_modal = tahun_masuk ?? ''
            var tahun_keluar_modal = tahun_keluar ?? ''
            var sertifikat_modal = sertifikat ?? ''

            $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6" id="modal_nama_pendidikan_append">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" id="modal_id" value="${id}" hidden>
                        <input class="form-control" id="modal_nama_pendidikan" placeholder="Masukan Nama" value="${nama_modal}">
                    </div>
                    <div class="col-md-6" id="modal_jurusan_pendidikan_append">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input class="form-control" id="modal_jurusan_pendidikan" placeholder="Jurusan" value="${jurusan_modal}">
                    </div>
                    <div class="col-md-6" id="modal_ipk_pendidikan_append">
                        <label for="ipk" class="form-label">IPK</label>
                        <input type="number" class="form-control" id="modal_ipk_pendidikan" placeholder="" value="${IPK_modal}">
                    </div>
                    <div class="col-md-6" id="modal_alamat_pendidikan_append">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" id="modal_alamat_pendidikan" placeholder="Masukan Alamat" value="${alamat_modal}">
                    </div>
                    <div class="col-md-6" id="modal_tanggal_masuk_pendidikan_append">
                        <label for="tanggal_masuk" class="form-label">Tahun Masuk</label>
                        <input class="form-control" id="modal_tanggal_masuk_pendidikan" placeholder="Masukan Tahun Masuk" type="number" placeholder="YYYY" min="1900" max="2100" value="${tahun_masuk_modal}">
                    </div>
                    <div class="col-md-6" id="modal_tanggal_keluar_pendidikan_append">
                        <label for="tanggal_keluar" class="form-label">Tahun Keluar</label>
                        <input class="form-control" id="modal_tanggal_keluar_pendidikan" placeholder="Masukan Tahun Keluar" type="number" placeholder="YYYY" min="1900" max="2100"value="${tahun_keluar_modal}">
                    </div>
                    <div class="col-md-12">
                    <label for="sertifikat" class="form-label">Sertifikat</label>
                    <input type="file" class="form-control" id="sertifikat" accept="image/*" data-sertifikat="${sertifikat_modal}">
                </div>
                <div class="col-lg-12 d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>&nbsp;
                    <button type="submit" class="btn btn-primary float-end" id="pendidikan">Simpan</button>
                </div>
            </div>
        `)

            $('#pendidikan').click(function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('id', $('#modal_id').val())
                formData.append('id_update', $('#id_update').val())
                formData.append('nama', $('#modal_nama_pendidikan').val());
                formData.append('jurusan', $('#modal_jurusan_pendidikan').val());
                formData.append('ipk', $('#modal_ipk_pendidikan').val());
                formData.append('alamat', $('#modal_alamat_pendidikan').val());
                formData.append('tahun_masuk', $('#modal_tanggal_masuk_pendidikan').val());
                formData.append('tahun_keluar', $('#modal_tanggal_keluar_pendidikan').val());

                var sertifikatFiles = $('#sertifikat')[0].files;
                if (sertifikatFiles.length > 0) {
                    formData.append('sertifikat', sertifikatFiles[0]);
                }

                $.ajax({
                    url: "{{ route('simpan.karyawan.pendidikan') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                title: 'Simpan!',
                                text: 'Data Berhasil disimpan.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTablePendidikan').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.alert_hapus').remove()
                            console.log(response.message.nama == "The nama field is required.")
                            if (response.message.nama == "The nama field is required.")
                                $('#modal_nama_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.jurusan == "The jurusan field is required.")
                                $('#modal_jurusan_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.ipk == "The ipk field is required.")
                                $('#modal_ipk_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.alamat == "The alamat field is required.")
                                $('#modal_alamat_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.tahun_masuk == "The tahun masuk field is required.")
                                $('#modal_tanggal_masuk_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.tahun_keluar == "The tahun keluar field is required.")
                                $('#modal_tanggal_keluar_pendidikan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function modal_crud_pelatihan(data, id, nama, periode, sertifikat) {
            var nama_modal = nama ?? ''
            var periode_modal = periode ?? ''
            var sertifikat_modal = sertifikat ?? ''

            $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data Pelatihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6" id="modal_nama_pelatihan_append">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" id="modal_id" value="${id}" hidden>
                        <input class="form-control" id="modal_nama_pelatihan" placeholder="Masukan Nama" value="${nama_modal}">
                    </div>
                    <div class="col-md-6" id="modal_periode_pelatihan_append">
                        <label for="periode" class="form-label">Periode</label>
                        <input type="number" min="1900" max="2100" class="form-control" id="modal_periode_pelatihan" placeholder="Periode" value="${periode_modal}">
                    </div>
                    <div class="col-md-12">
                        <label for="sertifikat" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="modal_sertifikat_pelatihan" accept="image/*" data-sertifikat="${sertifikat_modal}">
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>&nbsp;
                    <button type="submit" class="btn btn-primary float-end" id="pelatihan">Simpan</button>
                </div>
            </div>
        `)

            $('#pelatihan').click(function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('id', $('#modal_id').val())
                formData.append('id_update', $('#id_update').val())
                formData.append('nama', $('#modal_nama_pelatihan').val());
                formData.append('periode', $('#modal_periode_pelatihan').val());

                var sertifikatFiles = $('#modal_sertifikat_pelatihan')[0].files;
                if (sertifikatFiles.length > 0) {
                    formData.append('sertifikat', sertifikatFiles[0]);
                }

                $.ajax({
                    url: "{{ route('simpan.karyawan.pelatihan') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                title: 'Simpan!',
                                text: 'Data Berhasil disimpan.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTablePelatihan').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.alert_hapus').remove()
                            if (response.message.nama == "The nama field is required.")
                                $('#modal_nama_pelatihan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.periode == "The periode field is required.")
                                $('#modal_periode_pelatihan_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit').on('click', function() {
                var data = new FormData()
                data.append('_method', 'PUT')
                data.append('id', id)
                data.append('kategori_id', $('#modal_kategori_id').val())
                data.append('subkategori', $('#modal_subkategori').val())
                data.append('url', $('#modal_url').val())
                $.ajax({
                    url: "{{ url('subkategori') }}/" + id,
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == 200) {
                            Swal.fire({
                                title: 'Edit!',
                                text: 'Your file has been edit.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTable').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.remove_username').remove()
                            $('.remove_nama_lengkap').remove()
                            $('.remove_role').remove()
                            // if (result.)
                            $('.modal_username_append').append(`
                            <span class="remove_username text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });

            })
        }

        function modal_crud_riwayat(data, id, nama, alamat, jabatan, masuk, keluar, deskripsi, alasan, sertifikat) {
            var nama_modal = nama ?? ''
            var alamat_modal = alamat ?? ''
            var jabatan_modal = jabatan ?? ''
            var masuk_modal = masuk ?? ''
            var keluar_modal = keluar ?? ''
            var deskripsi_modal = deskripsi ?? ''
            var alasan_modal = alasan ?? ''
            var sertifikat_modal = sertifikat ?? ''

            $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data Riwayat Pekerjaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6" id="modal_nama_riwayat_append">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" id="modal_id" value="${id}" hidden>
                        <input class="form-control" id="modal_nama_riwayat" placeholder="Masukan Nama" value="${nama_modal}">
                    </div>
                    <div class="col-md-6" id="modal_alamat_riwayat_append">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" id="modal_alamat_riwayat" placeholder="Alamat" value="${alamat_modal}">
                    </div>
                    <div class="col-md-6" id="modal_jabatan_riwayat_append">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input class="form-control" id="modal_jabatan_riwayat" placeholder="Jabatan" value="${jabatan_modal}">
                    </div>
                    <div class="col-md-6" id="modal_periode_masuk_riwayat_append">
                        <label for="periode_masuk" class="form-label">Periode Masuk</label>
                        <input type="date" class="form-control" id="modal_periode_masuk_riwayat" placeholder="Periode" value="${masuk_modal}">
                    </div>
                    <div class="col-md-6" id="modal_periode_keluar_riwayat_append">
                        <label for="periode_keluar" class="form-label">Periode keluar</label>
                        <input type="date" class="form-control" id="modal_periode_keluar_riwayat" placeholder="Periode" value="${keluar_modal}">
                    </div>
                    <div class="col-md-6" id="modal_deskripsi_riwayat_append">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input class="form-control" id="modal_deskripsi_riwayat" placeholder="Deskripsi" value="${deskripsi_modal}">
                    </div>
                    <div class="col-md-6" id="modal_alasan_riwayat_append">
                        <label for="alasan" class="form-label">Alasan</label>
                        <input class="form-control" id="modal_alasan_riwayat" placeholder="Alasan" value="${alasan_modal}">
                    </div>
                    <div class="col-md-6">
                        <label for="sertifikat" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="modal_sertifikat_riwayat" accept="image/*" data-sertifikat="${sertifikat_modal}">
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>&nbsp;
                    <button type="submit" class="btn btn-primary float-end" id="riwayat_pekerjaan">Simpan</button>
                </div>
            </div>
        `)

            $('#riwayat_pekerjaan').click(function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('id', $('#modal_id').val())
                formData.append('id_update', $('#id_update').val())
                formData.append('nama', $('#modal_nama_riwayat').val());
                formData.append('alamat', $('#modal_alamat_riwayat').val());
                formData.append('jabatan', $('#modal_jabatan_riwayat').val());
                formData.append('masuk', $('#modal_periode_masuk_riwayat').val());
                formData.append('keluar', $('#modal_periode_keluar_riwayat').val());
                formData.append('deskripsi', $('#modal_deskripsi_riwayat').val());
                formData.append('alasan', $('#modal_alasan_riwayat').val());

                var sertifikatFiles = $('#modal_sertifikat_riwayat')[0].files;
                if (sertifikatFiles.length > 0) {
                    formData.append('sertifikat', sertifikatFiles[0]);
                }

                $.ajax({
                    url: "{{ route('simpan.karyawan.riwayat') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                title: 'Simpan!',
                                text: 'Data Berhasil disimpan.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTableRiwayat').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.alert_hapus').remove()
                            if (response.message.nama == "The nama field is required.")
                                $('#modal_nama_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.alamat == "The alamat field is required.")
                                $('#modal_alamat_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.jabatan == "The jabatan field is required.")
                                $('#modal_jabatan_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.masuk == "The masuk field is required.")
                                $('#modal_periode_masuk_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.keluar == "The keluar field is required.")
                                $('#modal_periode_keluar_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.deskripsi == "The deskripsi field is required.")
                                $('#modal_deskripsi_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                            if (response.message.alasan == "The alasan field is required.")
                                $('#modal_alasan_riwayat_append').append(`
                            <span class="alert_hapus text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit').on('click', function() {
                var data = new FormData()
                data.append('_method', 'PUT')
                data.append('id', id)
                data.append('kategori_id', $('#modal_kategori_id').val())
                data.append('subkategori', $('#modal_subkategori').val())
                data.append('url', $('#modal_url').val())
                $.ajax({
                    url: "{{ url('subkategori') }}/" + id,
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == 200) {
                            Swal.fire({
                                title: 'Edit!',
                                text: 'Your file has been edit.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            }).then(function() {
                                $('#dataTable').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.remove_username').remove()
                            $('.remove_nama_lengkap').remove()
                            $('.remove_role').remove()
                            // if (result.)
                            $('.modal_username_append').append(`
                            <span class="remove_username text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                });

            })
        }

        function konfirmasi_hapus(id, name, tabel) {
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus " + name + "?",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = new FormData();
                    data.append('id', id);
                    data.append('tabel', tabel);
                    $.ajax({
                        type: "post",
                        url: "{{ route('hapus.data.data.karyawan') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Data berhasil dihapus',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            });
                            $('#dataTableKeluarga').DataTable().ajax.reload()
                            $('#dataTablePendidikan').DataTable().ajax.reload()
                            $('#dataTablePelatihan').DataTable().ajax.reload()
                            $('#dataTableRiwayat').DataTable().ajax.reload()
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: false,
                                timer: 1000
                            });
                        }
                    });
                }
            });
        }

        $(function() {
            // Datatable Keluarga
            var table = $('#dataTableKeluarga').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tabel.karyawan.keluarga') }}",
                    data: function(d) {
                        d.cari = $('#cari_keluarga').val(),
                            d.karyawanId = $('#id_update').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    name: 'nama',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud_keluarga('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.hubungan + `','` + row
                            .hubungan_id + `', '` + row.agama_id + `', '` + row.agama + `', '` +
                            row.pekerjaan + `', '` + row.alamat + `', '` + row.no_hp + `', '` +
                            row.tgl_lahir +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">` +
                            data + `</button>`;
                    }
                }, {
                    data: 'hubungan',
                    visible: false,
                }, {
                    data: 'hubungan_id',
                    name: 'Hubungan',
                }, {
                    data: 'agama_id',
                    visible: false,
                }, {
                    data: 'agama',
                    name: 'Agama',
                }, {
                    data: 'pekerjaan',
                    name: 'Pekerjaan',
                }, {
                    data: 'alamat',
                    name: 'Alamat',
                }, {
                    data: 'usia',
                    name: 'usia',
                }, {
                    data: 'no_hp',
                    name: 'Handphone',
                }, {
                    data: 'tanggal_lahir',
                    name: 'Tanggal Lahir',
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-warning" type="button" target="_blank" onclick="modal_crud_keluarga('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.hubungan + `','` + row
                            .hubungan_id + `', '` + row.agama_id + `', '` + row.agama + `', '` +
                            row.pekerjaan + `', '` + row.alamat + `', '` + row.no_hp + `', '` +
                            row.tgl_lahir +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Edit</button> <button class="btn btn-danger" onclick="konfirmasi_hapus(${data},'` +
                            row.nama + `','keluarga_karyawan')">Hapus</button>`;
                    }
                }]
            });

            $('#cari_keluarga').keyup(function() {
                table.draw();
            });

            var dataRole = {
                id: 1,
                text: "Islam",
                selected: true
            };
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
        });

        $('#foto_umum').change(function() {
            var file = this.files[0];
            if (file && file.type.match('image.*')) {
                $('#foto_umum_data').attr('src', URL.createObjectURL(file));
                $('a[href="#base-umum"]').tab('show');
                Swal.fire({
                    title: "Berhasil!",
                    text: "Pastikan simpan untuk merubah gambar",
                    icon: "success",
                    timer: 2500
                });
            }
        });

        $(function() {
            // Datatable Pendidikan
            var table = $('#dataTablePendidikan').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tabel.karyawan.pendidikan') }}",
                    data: function(d) {
                        d.cari = $('#cari_pendidikan').val(),
                            d.karyawanId = $('#id_update').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    name: 'Nama',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud_pendidikan('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.jurusan + `','` + row
                            .IPK + `', '` + row.alamat + `', '` + row.tahun_masuk + `', '` + row
                            .tahun_keluar + `', '` + row.sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">` +
                            data + `</button>`;
                    }
                }, {
                    data: 'jurusan',
                    name: "Jurusan",
                }, {
                    data: 'IPK',
                    name: 'Ipk',
                }, {
                    data: 'alamat',
                    name: "Alamat",
                }, {
                    data: 'tahun_masuk',
                    name: 'Tahun Masuk',
                }, {
                    data: 'tahun_keluar',
                    name: 'Tahun Keluar',
                }, {
                    data: 'sertifikat',
                    name: 'Sertifikat',
                    render: function(data) {
                        var img = data ?
                            `<img src="${data}" onclick="openModal('${data}')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" style="width: 100px; height: 100px;">` :
                            ``;
                        return img;
                    }
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-warning" type="button" target="_blank" onclick="modal_crud_pendidikan('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.jurusan + `','` + row
                            .IPK + `', '` + row.alamat + `', '` + row.tahun_masuk + `', '` + row
                            .tahun_keluar + `', '` + row.sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Edit</button> <button class="btn btn-danger" onclick="konfirmasi_hapus(${data},'` +
                            row.nama + `','pendidikan_karyawan')">Hapus</button>`;
                    }
                }]
            });

            $('#cari_pendidikan').keyup(function() {
                table.draw();
            });

            var dataRole = {
                id: 1,
                text: "Islam",
                selected: true
            };

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
        });

        $(function() {
            // Datatable Pelatihan
            var table = $('#dataTablePelatihan').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tabel.karyawan.pelatihan') }}",
                    data: function(d) {
                        d.cari = $('#cari_pelatihan').val(),
                            d.karyawanId = $('#id_update').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    name: 'Nama',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud_pelatihan('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.periode + `', '` + row
                            .sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">` +
                            data + `</button>`;
                    }
                }, {
                    data: 'periode',
                    name: "periode",
                }, {
                    data: 'sertifikat',
                    name: 'Sertifikat',
                    render: function(data) {
                        var img = data ?
                            `<img src="${data}" onclick="openModal('${data}')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" style="width: 100px; height: 100px;">` :
                            ``;
                        return img;
                    }
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-warning" type="button" target="_blank" onclick="modal_crud_pelatihan('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.periode + `', '` + row
                            .sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Edit</button> <button class="btn btn-danger" onclick="konfirmasi_hapus(${data},'` +
                            row.nama + `','karyawan_pelatihan')">Hapus</button>`;
                    }
                }]
            });

            $('#cari_pelatihan').keyup(function() {
                table.draw();
            });
        });

        $(function() {
            // Datatable Pelatihan
            var table = $('#dataTableRiwayat').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tabel.karyawan.riwayat') }}",
                    data: function(d) {
                        d.cari = $('#cari_riwayat').val(),
                            d.karyawanId = $('#id_update').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    name: 'Nama',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud_riwayat('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.alamat + `','` + row
                            .jabatan + `','` + row.masuk + `', '` + row.keluar + `', '` + row
                            .deskripsi + `', '` + row.alasan + `','` + row.sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">` +
                            data + `</button>`;
                    }
                }, {
                    data: 'alamat',
                    name: 'Alamat',
                }, {
                    data: 'jabatan',
                    name: "Jabatan",
                }, {
                    data: 'tanggal_masuk',
                    name: 'Tanggal Masuk',
                }, {
                    data: 'tanggal_keluar',
                    name: "Tanggal Keluar",
                }, {
                    data: 'deskripsi',
                    name: 'Deskripsi',
                }, {
                    data: 'alasan',
                    name: "Alasan",
                }, {
                    data: 'sertifikat',
                    name: 'Sertifikat',
                    render: function(data) {
                        var img = data ?
                            `<img src="${data}" onclick="openModal('${data}')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" style="width: 100px; height: 100px;">` :
                            ``;
                        return img;
                    }
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-warning" type="button" target="_blank" onclick="modal_crud_riwayat('Edit','` +
                            row.id + `','` + row.nama + `', '` + row.alamat + `','` + row
                            .jabatan + `','` + row.masuk + `', '` + row.keluar + `', '` + row
                            .deskripsi + `', '` + row.alasan + `','` + row.sertifikat +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Edit</button> <button class="btn btn-danger" onclick="konfirmasi_hapus(${data},'` +
                            row.nama + `','riwayat_karyawan')">Hapus</button>`;
                    }
                }]
            });

            $('#cari_riwayat').keyup(function() {
                table.draw();
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dataRole = {
            id: 20230505000065,
            text: "S1",
            selected: true
        };
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

        var dataRole = {
            id: 2,
            text: "Kawin dengan 1 Tanggungan",
            selected: true
        };
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

        var dataRole = {
            id: 8,
            text: "Bank Bca",
            selected: true
        };
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

        $('#departement_pekerjaan').select2({
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

        $('#save_umum').click(function() {
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
                fd.append('foto_umum', $('#foto_umum')[0].files[0])

            $.ajax({
                type: 'post',
                url: "{{ route('simpan_karyawan_umum') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link')
                            .addClass('active');
                        $('#save_umum').text('Update')

                        $('.nama_lengkap').text(response.message.nama_lengkap)
                        if (response.message.foto != null)
                            $('#foto_umum_data').attr('src', response.message.foto)
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data Berhasil di Simpan",
                            icon: "success",
                            timer: 1000
                        });
                        $('#save_personal').prop('disabled', false)
                        $('#save_pekerjaan').prop('disabled', false)
                        $('#tambah_keluarga').prop('disabled', false)
                        $('#tambah_pendidikan').prop('disabled', false)
                        $('#tambah_pelatihan').prop('disabled', false)
                        $('#tambah_riwayat').prop('disabled', false)
                    } else {
                        $('.alert_hapus').remove()
                        if (response.message.nama_lengkap_umum)
                            $('#alert_nama_lengkap_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.nama_panggilan_umum)
                            $('#alert_nama_panggilan_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.alamat_ktp_umum)
                            $('#alert_alamat_ktp_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.alamat_domisili_umum)
                            $('#alert_alamat_domisili_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.tempat_lahir_umum)
                            $('#alert_tempat_lahir_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.tanggal_lahir_umum)
                            $('#alert_tanggal_lahir_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.no_handphone_umum)
                            $('#alert_no_handphone_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.pendidikan_terakhir_umum)
                            $('#alert_pendidikan_terakhir_umum').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        Swal.fire({
                            title: "Error!",
                            text: "Cek kembali data yang anda masukan!",
                            icon: "error",
                            timer: 1000
                        });
                    }
                }
            });

        });

        $('#save_personal').click(function() {
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
            if ($('#no_ktp')[0].files.length !== 0) fd.append('no_ktp', $('#no_ktp')[0].files[0])
            if ($('#no_kartu_keluarga')[0].files.length !== 0) fd.append('no_kartu_keluarga', $(
                '#no_kartu_keluarga')[0].files[0])
            $.ajax({
                type: 'post',
                url: "{{ route('simpan_karyawan_personal') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link')
                            .addClass('active');
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data Berhasil di Simpan",
                            icon: "success",
                            timer: 1000
                        });
                    } else {
                        $('.alert_hapus').remove()
                        if (response.message.no_identitas_personal)
                            $('#alert_no_identitas_personal').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.nama_bank_personal)
                            $('#alert_nama_bank_personal').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        Swal.fire({
                            title: "Error!",
                            text: "Cek kembali data yang anda masukan!",
                            icon: "error",
                            timer: 1000
                        });
                    }
                }
            });
        });

        $('#periode_kontrak').change(function() {
            var selectedValue = $(this).val();
            var kontrakMasuk = new Date($('#kontrak_masuk').val());
            var kontrakSelesai = new Date(kontrakMasuk);
            kontrakSelesai.setMonth(kontrakSelesai.getMonth() + (selectedValue * 3));
            $('#kontrak_selesai').val(kontrakSelesai.toISOString().slice(0, 10));

            var selisihMillis = kontrakSelesai - kontrakMasuk;
            var selisihTahun = Math.floor(selisihMillis / (1000 * 60 * 60 * 24 * 365));
            var selisihBulan = Math.floor((selisihMillis % (1000 * 60 * 60 * 24 * 365)) / (1000 * 60 * 60 * 24 *
                30));

            $('#kontrak_bulan').text(selisihBulan.toString().padStart(2, '0'));
            $('#kontrak_tahun').text(selisihTahun.toString().padStart(2, '0'));
        });

        $('#save_pekerjaan').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var fd = new FormData()
            fd.append('id_update', $('#id_update').val())
            fd.append('cabang_pekerjaan', $('#cabang_pekerjaan').val());
            fd.append('departement_pekerjaan', $('#departement_pekerjaan').val());
            fd.append('jabatan_pekerjaan', $('#jabatan_pekerjaan').val());
            fd.append('status_kontrak', $('#status_kontrak').val());
            fd.append('kontrak_masuk', $('#kontrak_masuk').val());
            fd.append('kontrak_selesai', $('#kontrak_selesai').val());
            fd.append('periode_kontrak', $('#periode_kontrak').val());
            fd.append('potongan_terlambat', $('#potongan_terlambat').val());
            fd.append('toleransi_keterlambatan', $('#toleransi_keterlambatan').val());
            fd.append('absen_diluar_kantor', $('#absen_diluar_kantor').val());
            $.ajax({
                type: 'post',
                url: "{{ route('simpan_karyawan_pekerjaan') }}",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {

                        $('#id_update').val(response.message.id)
                        var activeTab = $('.tab-pane.active');
                        var activeTab = $('.tab-pane.active');
                        activeTab.removeClass('show active');
                        activeTab.next('.tab-pane').addClass('show active');
                        $('.nav-link.active').removeClass('active').parent().next().find('.nav-link')
                            .addClass('active');
                        $('#save_pekerjaan').prop('disabled', false)
                        $('.divisi_lengkap').text($('#departement_pekerjaan option:selected').text()
                            .trim());
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data Berhasil di Simpan",
                            icon: "success",
                            timer: 1000
                        });
                    } else {
                        $('.alert_hapus').remove()
                        if (response.message.cabang_pekerjaan)
                            $('#alert_cabang_pekerjaan').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.departement_pekerjaan)
                            $('#alert_departement_pekerjaan').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.jabatan_pekerjaan)
                            $('#alert_jabatan_pekerjaan').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.cost_center_pekerjaan)
                            $('#alert_cost_center_pekerjaan').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.tanggal_masuk)
                            $('#alert_tanggal_masuk').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.kontrak_selesai)
                            $('#alert_kontrak_selesai').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.status_kontrak)
                            $('#alert_status_kontrak').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.periode_kontrak)
                            $('#alert_periode_kontrak').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.potongan_terlambat)
                            $('#alert_potongan_terlambat').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )
                        if (response.message.toleransi_keterlambatan)
                            $('#alert_toleransi_keterlambatan').append(
                                `<span class="fs-10 text-danger alert_hapus">Silahkan Lengkapi data</span>`
                            )

                        Swal.fire({
                            title: "Error!",
                            text: "Cek kembali data yang anda masukan!",
                            icon: "error",
                            timer: 1000
                        });
                    }
                }
            });
        });
    </script>
@endsection
