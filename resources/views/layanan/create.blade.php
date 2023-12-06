@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    @include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('layanans.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-4">
                            <label for="layanan" class="form-label">Layanan</label>
                            <input id="layanan" name="layanan" class="form-control"
                                placeholder="Masukan Nama Layanan Baru" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="kode" class="form-label">Kode</label>
                            <input id="kode" name="kode" onkeydown="return /[A-Z]/i.test(event.key)" minlength="2"
                                maxlength="2" class="form-control"
                                placeholder="Masukan Kode sebanyak 2 karakter, untuk tampikan monitor antrian dan tiket antrian" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="colorPicker" class="form-label">Warna Kiosk</label>
                            <input type="color" class="form-control form-control-color w-100" name="colorPicker"
                                id="colorPicker" value="#364574">
                            <span class="text-danger fs-12">Hindari warna terang, karena text kiosk berwarna putih</span>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" />
                        </div>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="icon" class="form-label">Pilih Icon Untuk Layanan</label>
                    <input type="file" name="icon" />
                </div>
                <button class="btn btn-success form-control"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i>
                    Simpan</button>
                </form>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
    </div>
    <!--end row-->
@endsection
