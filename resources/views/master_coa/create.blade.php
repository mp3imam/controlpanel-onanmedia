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
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="header_coa" class="form-label">Header Coa</label>
                                <select id="header_coa_id" name="header_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="deskripsi_coa" class="form-label">Deskripsi Coa</label>
                                <select id="deskripsi_coa_id" name="deskripsi_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="detail_coa" class="form-label">Detail Coa</label>
                                <select id="detail_coa_id" name="detail_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="kode_coa" class="form-label">Kode Coa</label>
                                <input class="form-control" id="kode_coa" name="kode_coa" />
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="uraian" class="form-label">Uraian</label>
                                <input class="form-control" id="uraian" name="uraian" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rekening_bank" class="form-label">Rekening Bank</label>
                                <input class="form-control" id="rekening_bank" name="rekening_bank" />
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="nama_bank" class="form-label">Nama Bank</label>
                                <input class="form-control" id="nama_bank" name="nama_bank" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto mb-4">
                                <a class="btn btn-warning float-end text-white rounded-5 me-3" href="{{ route('master_coa.index') }}" >
                                    <i class="ri-arrow-go-back-line"></i> Kembali
                                </a>
                                <button class="btn float-end btn-success text-white rounded-5 me-3" style="background-color: #4E36E2">
                                    <i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
<script>
    $("#header_coa_id").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_header_coa') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name,
                            kdrek1: item.kdrek1
                        };
                    })
                };
            }
        }
    }).on('select2:select', function(e) {
        $("#kode_coa").val(parseInt(e.params.data.kdrek1) + 1);
        // reset select2 all
        $("#deskripsi_coa_id").val('').trigger('change')
        $("#detail_coa_id").val('').trigger('change')

        $("#deskripsi_coa_id").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_deskripsi_coa') }}?header_id="+e.params.data.kdrek1,
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name,
                            kdrek1: item.kdrek1
                        };
                    })
                };
            }
        }
        }).on('select2:select', function(e) {
            $("#kode_coa").val(parseInt(e.params.data.kdrek1) + 1);
            // reset select2 all
            $("#detail_coa_id").val('').trigger('change')

            $("#detail_coa_id").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_uraian_coa') }}?header_id="+e.params.data.kdrek1,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                id: item.id,
                                text: item.name,
                                kdrek: item.kdrek
                            };
                        })
                    };
                }
            }
            }).on('select2:select', function(e) {
                $("#kode_coa").val(parseFloat(parseFloat(e.params.data.kdrek) + parseFloat(0.001)).toFixed(3));
            });
        });
    });
</script>
@endsection
