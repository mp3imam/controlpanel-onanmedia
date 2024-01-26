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
                            <div class="col-md-4 mb-4">
                                <label for="pilih_data" class="form-label">Tambahkan Data</label>
                                <select id="pilih_data_id" name="pilih_data_id" class="form-control" required>
                                    <option value="1">Header</option>
                                    <option value="2">Deskripsi</option>
                                    <option value="3">Uraian</option>
                                    <option value="4" selected>Detail</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4" id="header_coa_hidden">
                                <label for="header_coa" class="form-label">Header Coa</label>
                                <select id="header_coa_id" name="header_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-4 mb-4" id="deskripsi_coa_hidden">
                                <label for="deskripsi_coa" class="form-label">Deskripsi Coa</label>
                                <select id="deskripsi_coa_id" name="deskripsi_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-4 mb-4" id="uraian_coa_hidden">
                                <label for="uraian_coa" class="form-label">Uraian Coa</label>
                                <select id="uraian_coa_id" name="uraian_coa_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="kode_coa" class="form-label">Kode Coa</label>
                                <input class="form-control" id="kode_coa" name="kode_coa" />
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="uraian" class="form-label">Nama Akun</label>
                                <input class="form-control" id="uraian" name="uraian" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="rekening_bank" class="form-label">Rekening Bank</label>
                                <input class="form-control" id="rekening_bank" name="rekening_bank" />
                            </div>
                            <div class="col-md-4 mb-4">
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
        $("#deskripsi_coa_id").val('').trigger('change')
        $("#uraian_coa_id").val('').trigger('change')
        $("#kode_coa").val("");

        if ($('#pilih_data_id').val() != "2"){
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
                                    kdrek1: item.kdrek1,
                                    kdrek2: item.kdrek2,
                                    kdrek3: item.kdrek3
                                };
                            })
                        };
                    }
                }
            }).on('select2:select', function(e) {
                $("#uraian_coa_id").val('').trigger('change')
                $("#kode_coa").val("");

                if ($('#pilih_data_id').val() != "3"){
                    $("#uraian_coa_id").select2({
                        allowClear: true,
                        width: '100%',
                        ajax: {
                            url: "{{ route('api.get_select2_uraian') }}?header_id="+e.params.data.kdrek1+"&kdrek2="+e.params.data.kdrek2+"&kdrek3="+e.params.data.kdrek3,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data.data, function(item) {
                                        return {
                                            id: item.id,
                                            text: item.name,
                                            kdrek1: item.kdrek1,
                                            kdrek2: item.kdrek2,
                                            kdrek3: item.kdrek3
                                        };
                                    })
                                };
                            }
                        }
                    }).on('select2:select', function(e) {
                        $.ajax({
                            url: "{{ url('api/count_detail_coa') }}?header_id=" + e.params.data.kdrek1 + "&kdrek2=" + e.params.data.kdrek2 + "&kdrek3=" + e.params.data.kdrek3,
                            type: "get",
                            success: function (response) {
                                $("#kode_coa").val(response.data);
                            },
                            error: function () {
                                $("#kode_coa").val("")
                            },
                        });
                    })
                }else{
                    $.ajax({
                        type: "get",
                        url: "{{ url('api/count_uraian_coa') }}?header_id=" + e.params.data.kdrek1 + "&kdrek2=" + e.params.data.kdrek2 + "&kdrek3=" + e.params.data.kdrek3,
                        success: function (response) {
                            $("#kode_coa").val(response.data);
                        }
                    });
                }
            })
        }else{
            $.ajax({
                type: "get",
                url: "{{ route('api.count_deskripsi_coa', ['header_id' => '']) }}" + e.params.data.kdrek1,
                success: function (response) {
                    $("#kode_coa").val(response.data);
                }
            });
        }
    });

    $('#pilih_data_id').on('change',function (e) {
        $("#kode_coa").val("");
        $("#header_coa_id").val('').trigger('change')
        $("#deskripsi_coa_id").val('').trigger('change')
        $("#uraian_coa_id").val('').trigger('change')
        switch (this.value) {
            case "1":
                $('#header_coa_hidden').hide()
                $('#deskripsi_coa_hidden').hide()
                $('#uraian_coa_hidden').hide()
                $.ajax({
                    type: "get",
                    url: "{{ route('api.count_header_coa') }}",
                    success: function (response) {
                        $("#kode_coa").val(response.data);
                    }
                });
            break;
            case "2":
                $('#header_coa_hidden').show()
                $('#deskripsi_coa_hidden').hide()
                $('#uraian_coa_hidden').hide()
            break;
            case "3":
                $('#header_coa_hidden').show()
                $('#deskripsi_coa_hidden').show()
                $('#uraian_coa_hidden').hide()
            break;

            default:
                $('#header_coa_hidden').show()
                $('#deskripsi_coa_hidden').show()
                $('#uraian_coa_hidden').show()
            break;
        }
    });

</script>
@endsection
