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
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title mb-0">Edit Rekening Bank</h4>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ url('master_coa', $detail->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger text-right">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('master_coa.update', $detail->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 mb-4">
                            <label for="uraian" class="form-label">Uraian</label>
                            <input class="form-control" id="uraian" name="uraian" value="{{ $detail->uraian }}" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="rekening_bank" class="form-label">Rekening Bank</label>
                            <input class="form-control" id="rekening_bank" name="rekening_bank" value="{{ $detail->rekening_bank }}" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_bank" class="form-label">Alamat Bank</label>
                            <textarea class="form-control" id="alamat_bank" name="alamat_bank">{{ $detail->alamat_bank }}</textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input class="form-control" id="nama_bank" name="nama_bank" value="{{ $detail->nama_bank }}" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="account_name" class="form-label">Account Name</label>
                            <input class="form-control" id="account_name" name="account_name" value="{{ $detail->account_name }}" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="swift_code" class="form-label">Swift Code</label>
                            <input class="form-control" id="swift_code" name="swift_code" value="{{ $detail->swift_code }}" />
                        </div>
                        <button class="btn form-control text-white" style="background-color: #4E36E2">Ubah</button>
                    </form>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
@
