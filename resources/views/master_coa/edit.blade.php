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
                    <div class="row justify-content-between">
                        <div class="col-md-8">
                            <h4 class="card-title mb-0">Edit Rekening Bank</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <button id="deleteButton" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('master_coa.update', $details->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="row mb-4">
                                <div class="col-md">
                                    <label for="pilih_data" class="form-label">Tambahkan Data</label>
                                    <input name="akun_bank" value="{{ $details->akun_bank }}" hidden>
                                    <input name="pilih_data" value="{{ $details->type }}" hidden>
                                    <select id="pilih_data_id" name="pilih_data_id" class="form-control" disabled>
                                        <option value="1" {{ $details->type == 'H' ? 'selected' : '' }}>Header</option>
                                        <option value="2" {{ $details->type == 'S' ? 'selected' : '' }}>SubHeader
                                        </option>
                                        <option value="3" {{ $details->type == 'C' ? 'selected' : '' }}>Category
                                        </option>
                                        <option value="4" {{ $details->type == 'D' ? 'selected' : '' }}>Detail</option>
                                    </select>
                                </div>
                                <div class="col-md kdrek1_coa_hidden">
                                    <label for="kdrek1_coa" class="form-label">Header Coa</label>
                                    <input name="kdrek1_coa" value="{{ $details->kdrek1 }}" hidden>
                                    <select id="kdrek1_coa_id" name="kdrek1_coa_id" class="form-control" disabled></select>
                                </div>
                                <div class="col-md kdrek2_coa_hidden">
                                    <label for="kdrek2_coa" class="form-label">Deskripsi Coa</label>
                                    <input name="kdrek2_coa" value="{{ $details->kdrek2 }}" hidden>
                                    <select id="kdrek2_coa_id" name="kdrek2_coa_id" class="form-control" disabled></select>
                                </div>
                                <div class="col-md kdrek3_coa_hidden">
                                    <label for="kdrek3_coa" class="form-label">Uraian Coa</label>
                                    <input name="kdrek3_coa" value="{{ $details->kdrek3 }}" hidden>
                                    <select id="kdrek3_coa_id" name="kdrek3_coa_id" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="kdrek" class="form-label">Kode Coa</label>
                                    <input class="form-control" id="kdrek" name="kdrek"
                                        value="{{ $details->kdrek }}" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nama_akun" class="form-label">Nama Akun</label>
                                    <input class="form-control" id="nama_akun" name="nama_akun"
                                        value="{{ $details->uraian }}" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="rekening_bank" class="form-label">Rekening Bank</label>
                                    <input type="number" class="form-control" id="rekening_bank" name="rekening_bank"
                                        value="{{ $details->rekening_bank }}" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nama_bank" class="form-label">Nama Bank</label>
                                    <input class="form-control" id="nama_bank" name="nama_bank"
                                        value="{{ $details->nama_bank }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto mb-4">
                                <a class="btn btn-warning float-end text-white rounded-5 me-3"
                                    href="{{ route('master_coa.index') }}">
                                    <i class="ri-arrow-go-back-line"></i> Kembali
                                </a>
                                <button class="btn float-end btn-success text-white rounded-5 me-3"
                                    style="background-color: #4E36E2">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#deleteButton').click(function(e) {
                e.preventDefault(); // Prevent the default click behavior

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi
                        $.ajax({
                            url: '{{ url('master_coa', $details->id) }}',
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                let timerInterval;
                                Swal.fire({
                                    title: "Berhasil!",
                                    html: "Hapus",
                                    timer: 1000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup()
                                            .querySelector("b");
                                        timerInterval = setInterval(() => {
                                            timer.textContent =
                                                `${Swal.getTimerLeft()}`;
                                        }, 100);
                                    },
                                    willClose: () => {
                                        window.location =
                                            "{{ route('master_coa.index') }}"
                                    }
                                }).then((result) => {
                                    if (result.dismiss === Swal.DismissReason
                                        .timer) {
                                        window.location =
                                            "{{ route('master_coa.index') }}"
                                    }
                                });
                            },
                            error: function(xhr) {
                                // Tindakan jika penghapusan gagal
                                console.log('Gagal menghapus data.');
                                // Tambahkan kode lain yang Anda perlukan jika penghapusan gagal
                            }
                        });
                    }
                });
            });

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
                $("#kdrek").val("");

                if ($('#pilih_data_id').val() != "2") {
                    $("#kdrek2_coa_id").select2({
                        allowClear: true,
                        width: '100%',
                        ajax: {
                            url: "{{ route('api.get_select2_kdrek2_coa') }}?kdrek1=" + e.params
                                .data.kdrek1,
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
                        $("#kdrek").val("");

                        if ($('#pilih_data_id').val() != "3") {
                            $("#kdrek3_coa_id").select2({
                                allowClear: true,
                                width: '100%',
                                ajax: {
                                    url: "{{ route('api.get_select2_kdrek3') }}?kdrek1=" +
                                        details['kdrek1'] + "&kdrek2=" + details['kdrek2'] +
                                        "&kdrek3=" + details['kdrek3'],
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        if (data.status == '200') {
                                            return {
                                                results: $.map(data.data, function(
                                                    item) {
                                                    return {
                                                        id: item.kdrek3,
                                                        text: item.name,
                                                        kdrek1: item.kdrek1,
                                                        kdrek2: item.kdrek2,
                                                        kdrek3: item.kdrek3
                                                    };
                                                })
                                            };
                                        } else {
                                            $("#kdrek").val(data.data);
                                        }
                                    }
                                }
                            }).on('select2:select', function(e) {
                                $.ajax({
                                    url: "{{ url('api/count_kdrek_coa') }}?kdrek1=" +
                                        details['kdrek1'] + "&kdrek2=" + details[
                                            'kdrek2'] + "&kdrek3=" + details[
                                            'kdrek3'],
                                    type: "get",
                                    success: function(response) {
                                        $("#kdrek").val(response.data);
                                    },
                                    error: function() {
                                        $("#kdrek").val("")
                                    },
                                });
                            })
                        } else {
                            $.ajax({
                                type: "get",
                                url: "{{ url('api/count_kdrek3_coa') }}?kdrek1=" + details[
                                        'kdrek1'] + "&kdrek2=" + details['kdrek2'] +
                                    "&kdrek3=" + details['kdrek3'],
                                success: function(response) {
                                    $("#kdrek").val(response.data);
                                }
                            });
                        }
                    })
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ route('api.count_kdrek2_coa', ['kdrek1' => '']) }}" + e.params
                            .data.kdrek1,
                        success: function(response) {
                            $("#kdrek").val(response.data);
                        }
                    });
                }
            });

            $("#kdrek2_coa_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_kdrek2_coa') }}?kdrek1=" + details['kdrek1'],
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
                $("#kdrek").val("");

                if ($('#pilih_data_id').val() != "3") {
                    $("#kdrek3_coa_id").select2({
                        allowClear: true,
                        width: '100%',
                        ajax: {
                            url: "{{ route('api.get_select2_kdrek3') }}?kdrek1=" + details[
                                    'kdrek1'] + "&kdrek2=" + details['kdrek2'] + "&kdrek3=" +
                                details['kdrek3'],
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                if (data.status == '200') {
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
                                } else {
                                    $("#kdrek").val(data.data);
                                }
                            }
                        }
                    }).on('select2:select', function(e) {
                        $.ajax({
                            url: "{{ url('api/count_kdrek_coa') }}?kdrek1=" + details[
                                    'kdrek1'] + "&kdrek2=" + details['kdrek2'] +
                                "&kdrek3=" + details['kdrek3'],
                            type: "get",
                            success: function(response) {
                                $("#kdrek").val(response.data);
                            },
                            error: function() {
                                $("#kdrek").val("")
                            },
                        });
                    })
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ url('api/count_kdrek3_coa') }}?kdrek1=" + details['kdrek1'] +
                            "&kdrek2=" + details['kdrek2'] + "&kdrek3=" + details['kdrek3'],
                        success: function(response) {
                            $("#kdrek").val(response.data);
                        }
                    });
                }
            })

            $("#kdrek3_coa_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_kdrek3') }}?kdrek1=" + details['kdrek1'] + "&kdrek2=" +
                        details['kdrek2'] + "&kdrek3=" + details['kdrek3'],
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        if (data.status == '200') {
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
                        } else {
                            $("#kdrek").val(data.data);
                        }
                    }
                }
            }).on('select2:select', function(e) {
                $.ajax({
                    url: "{{ url('api/count_kdrek_coa') }}?kdrek1=" + details['kdrek1'] +
                        "&kdrek2=" + details['kdrek2'] + "&kdrek3=" + details['kdrek3'],
                    type: "get",
                    success: function(response) {
                        $("#kdrek").val(response.data);
                    },
                    error: function() {
                        $("#kdrek").val("")
                    },
                });
            })

        });

        var details = {!! json_encode($details) !!}
        hiddenSelect2()

        // KDREK1
        if (details['type'] == 'S' || details['type'] == 'C' || details['type'] == 'D') {
            var dataKdrek1 = {
                id: details['kdrek1'],
                text: details['relasi_kdrek1']['uraian'],
                selected: true
            };
            var newOptionKdrek1 = new Option(dataKdrek1.text, dataKdrek1.id, false, false);
            $('#kdrek1_coa_id').append(newOptionKdrek1).trigger('change');
            $('#kdrek1_coa_id').select2();
            hiddenSelect2()
            $('.kdrek1_coa_hidden').prop('hidden', false)
            $('.kdrek1_coa_hidden').prop('required', true)
        }

        // KDREK2
        if (details['type'] == 'C' || details['type'] == 'D') {
            var dataKdrek2 = {
                id: details['kdrek2'],
                text: details['relasi_kdrek2']['uraian'],
                selected: true
            };
            var newOptionKdrek2 = new Option(dataKdrek2.text, dataKdrek2.id, false, false);
            $('#kdrek2_coa_id').append(newOptionKdrek2).trigger('change');
            $('#kdrek2_coa_id').select2();
            hiddenSelect2()
            $('.kdrek1_coa_hidden').prop('hidden', false)
            $('.kdrek1_coa_hidden').prop('required', true)
            $('.kdrek2_coa_hidden').prop('hidden', false)
            $('.kdrek2_coa_hidden').prop('required', true)
        }

        // KDREK3
        if (details['type'] == 'D') {
            var dataKdrek3 = {
                id: details['kdrek3'],
                text: details['relasi_kdrek3']['uraian'],
                selected: true
            };
            var newOptionKdrek3 = new Option(dataKdrek3.text, dataKdrek3.id, false, false);
            $('#kdrek3_coa_id').append(newOptionKdrek3).trigger('change');
            $('#kdrek3_coa_id').select2();
            $('.kdrek1_coa_hidden').prop('hidden', false)
            $('.kdrek1_coa_hidden').prop('required', true)
            $('.kdrek2_coa_hidden').prop('hidden', false)
            $('.kdrek2_coa_hidden').prop('required', true)
            $('.kdrek3_coa_hidden').prop('hidden', false)
            $('.kdrek3_coa_hidden').prop('required', true)
        }

        // if (dataKdrek1.text == dataKdrek2.text)
        // $("#kdrek2_coa_id").val('').trigger('change')

        // if (dataKdrek2.text == dataKdrek3.text)
        // $("#kdrek3_coa_id").val('').trigger('change')

        $('#pilih_data_id').on('change', function(e) {
            $("#kdrek").val("");
            $("#kdrek1_coa_id").val('').trigger('change')
            $("#kdrek2_coa_id").val('').trigger('change')
            $("#kdrek3_coa_id").val('').trigger('change')

            switch (this.value) {
                case "1":
                    hiddenSelect2()
                    $.ajax({
                        type: "get",
                        url: "{{ route('api.count_kdrek1_coa') }}",
                        success: function(response) {
                            $("#kdrek").val(response.data);
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

        function hiddenSelect2() {
            $('.kdrek1_coa_hidden').prop('hidden', true)
            $('.kdrek1_coa_hidden').prop('required', false)
            $('.kdrek2_coa_hidden').prop('hidden', true)
            $('.kdrek2_coa_hidden').prop('required', false)
            $('.kdrek3_coa_hidden').prop('hidden', true)
            $('.kdrek3_coa_hidden').prop('required', false)
        }
    </script>
@endsection
