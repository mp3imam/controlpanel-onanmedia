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
                            <div class="row">
                                <div class="col-md mb-4">
                                    <label for="pilih_data" class="form-label">Tambahkan Data</label>
                                    <select id="pilih_data_id" name="pilih_data_id" class="form-control" required>
                                        <option value="1">Header</option>
                                        <option value="2">SubHeader</option>
                                        <option value="3">Category</option>
                                        <option value="4" selected>Detail</option>
                                    </select>
                                </div>
                                <div class="col-md mb-4 kdrek1_coa_hidden">
                                    <label for="kdrek1_coa" class="form-label kdrek1_coa_hidden">Header Coa</label>
                                    <select id="kdrek1_coa_id" name="kdrek1_coa_id" class="form-control kdrek1_coa_hidden" required></select>
                                </div>
                                <div class="col-md mb-4 kdrek2_coa_hidden">
                                    <label for="kdrek2_coa" class="form-label kdrek2_coa_hidden">Deskripsi Coa</label>
                                    <select id="kdrek2_coa_id" name="kdrek2_coa_id" class="form-control kdrek2_coa_hidden" required></select>
                                </div>
                                <div class="col-md mb-4 kdrek3_coa_hidden">
                                    <label for="kdrek3_coa" class="form-label kdrek3_coa_hidden">Uraian Coa</label>
                                    <select id="kdrek3_coa_id" name="kdrek3_coa_id" class="form-control kdrek3_coa_hidden"></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="kode_coa" class="form-label">Kode Coa</label>
                                    <input class="form-control" id="kode_coa" name="kode_coa" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nama_akun" class="form-label">Nama Akun</label>
                                    <input class="form-control" id="nama_akun" name="nama_akun" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="rekening_bank" class="form-label">Rekening Bank</label>
                                    <input type="number" class="form-control" id="rekening_bank" name="rekening_bank" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nama_bank" class="form-label">Nama Bank</label>
                                    <input class="form-control" id="nama_bank" name="nama_bank" />
                                </div>
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
    $("#kdrek1_coa_id").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_kdrek1_coa') }}",
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
        $("#kdrek2_coa_id").val('').trigger('change')
        $("#kdrek3_coa_id").val('').trigger('change')
        $("#kode_coa").val("");

        if ($('#pilih_data_id').val() != "2"){
            $("#kdrek2_coa_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_kdrek2_coa') }}?kdrek1="+e.params.data.kdrek1,
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
                $("#kdrek3_coa_id").val('').trigger('change')
                $("#kode_coa").val("");

                if ($('#pilih_data_id').val() != "3"){
                    $("#kdrek3_coa_id").select2({
                        allowClear: true,
                        width: '100%',
                        ajax: {
                            url: "{{ route('api.get_select2_kdrek3') }}?kdrek1="+e.params.data.kdrek1+"&kdrek2="+e.params.data.kdrek2+"&kdrek3="+e.params.data.kdrek3,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                if (data.status == '200'){
                                    return {
                                        results: $.map(data.data, function(item) {
                                            return {
                                                id: item.kdrek3,
                                                text: item.name,
                                                kdrek1: item.kdrek1,
                                                kdrek2: item.kdrek2,
                                                kdrek3: item.kdrek3
                                            };
                                        })
                                    };
                                }else{
                                    $("#kode_coa").val(data.data);
                                }
                            }
                        }
                    }).on('select2:select', function(e) {
                        $.ajax({
                            url: "{{ url('api/count_kdrek_coa') }}?kdrek1=" + e.params.data.kdrek1 + "&kdrek2=" + e.params.data.kdrek2 + "&kdrek3=" + e.params.data.kdrek3,
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
                        url: "{{ url('api/count_kdrek3_coa') }}?kdrek1=" + e.params.data.kdrek1 + "&kdrek2=" + e.params.data.kdrek2 + "&kdrek3=" + e.params.data.kdrek3,
                        success: function (response) {
                            $("#kode_coa").val(response.data);
                        }
                    });
                }
            })
        }else{
            $.ajax({
                type: "get",
                url: "{{ route('api.count_kdrek2_coa', ['kdrek1' => '']) }}" + e.params.data.kdrek1,
                success: function (response) {
                    $("#kode_coa").val(response.data);
                }
            });
        }
    });

    $('#pilih_data_id').on('change',function (e) {
        $("#kode_coa").val("");
        $("#kdrek1_coa_id").val('').trigger('change')
        $("#kdrek2_coa_id").val('').trigger('change')
        $("#kdrek3_coa_id").val('').trigger('change')

        switch (this.value) {
            case "1":
                hiddenSelect2()
                $.ajax({
                    type: "get",
                    url: "{{ route('api.count_kdrek1_coa') }}",
                    success: function (response) {
                        $("#kode_coa").val(response.data);
                    }
                });
            break;
            case "2":
                hiddenSelect2()
                $('.kdrek1_coa_hidden').prop('hidden', false)
                $('.kdrek1_coa_hidden').prop('required', true)
            break;
            case "3":
                hiddenSelect2()
                $('.kdrek1_coa_hidden').prop('hidden', false)
                $('.kdrek1_coa_hidden').prop('required', true)
                $('.kdrek2_coa_hidden').prop('hidden', false)
                $('.kdrek2_coa_hidden').prop('required', true)
            break;

            default:
                $('.kdrek1_coa_hidden').prop('hidden', false)
                $('.kdrek1_coa_hidden').prop('required', true)
                $('.kdrek2_coa_hidden').prop('hidden', false)
                $('.kdrek2_coa_hidden').prop('required', true)
                $('.kdrek3_coa_hidden').prop('hidden', false)
                $('.kdrek3_coa_hidden').prop('required', true)
            break;
        }
    });

    function hiddenSelect2(){
        $('.kdrek1_coa_hidden').prop('hidden', true)
        $('.kdrek1_coa_hidden').prop('required', false)
        $('.kdrek2_coa_hidden').prop('hidden', true)
        $('.kdrek2_coa_hidden').prop('required', false)
        $('.kdrek3_coa_hidden').prop('hidden', true)
        $('.kdrek3_coa_hidden').prop('required', false)
    }

</script>
@endsection
