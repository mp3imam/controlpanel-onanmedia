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
                    <h4 class="card-title mb-0">Tambah Rekening Bank</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('master_coa.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-4">
                            <label for="uraian" class="form-label">Uraian</label>
                            <input class="form-control" id="uraian" name="uraian" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="rekening_bank" class="form-label">Rekening Bank</label>
                            <input class="form-control" id="rekening_bank" name="rekening_bank" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_bank" class="form-label">Alamat Bank</label>
                            <textarea class="form-control" id="alamat_bank" name="alamat_bank"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input class="form-control" id="nama_bank" name="nama_bank" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="account_name" class="form-label">Account Name</label>
                            <input class="form-control" id="account_name" name="account_name" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="swift_code" class="form-label">Swift Code</label>
                            <input class="form-control" id="swift_code" name="swift_code" />
                        </div>
                        <button class="btn btn-success form-control text-white" style="background-color: #4E36E2"><i
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
