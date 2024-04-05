@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-8">
                            <h4 class="card-title mb-0">Ubah Kembali ke Kas OnanMedia</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <button class="btn btn-danger" type="button"
                                onclick="konfirmasi_hapus({{ $detail->id }}, '{{ $detail->nomor_transaksi }}')">Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    @if ($detail->file->isNotEmpty())
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($detail->file as $foto => $f)
                                    <button id="carousel-role{{ $f->id }}" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $foto }}"
                                        class="active" aria-current="true" aria-label="Slide {{ $foto }}">
                                    </button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($detail->file as $foto => $f)
                                    <div id="carousel{{ $f->id }}" data-bs-interval="2000"
                                        class="carousel-item {{ $foto == 0 ? 'active' : '' }}">
                                        <iframe src="{{ $f->url }}" align="top" height="300px" width="100%"
                                            frameborder="0" scrolling="auto">
                                        </iframe>
                                        <div class="carousel-caption d-none d-md-block">
                                            <a href="{{ $f->url }}" target="_blank"
                                                class="btn btn-primary btn-icon waves-effect waves-light">
                                                <i class="ri-external-link-line"></i>
                                            </a>
                                            @if ($detail->jenis == 0)
                                                <button type="button"
                                                    class="btn btn-danger btn-icon waves-effect waves-light"
                                                    onclick="hapus_gambar('{{ $f->id }}')">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>

                <form action="{{ route('helpdesk.upload.image') }}" enctype="multipart/form-data"
                    class="dropzone dz-clickable" id="image-upload" method="post" id="gambar-dropzone">
                    @csrf
                    <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                    <div class="dz-default dz-message">
                        <div>Drag & drop a photo or</div>
                        <span class="text-primary">Browse</span>
                    </div>
                    <ul class="list-unstyled mb-0" id="dropzone-preview"></ul>
                </form>

                <div class="card-body">
                    <form action="{{ route('master_return_bank_cash.update', $detail->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                                <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                                    value="{{ $detail->tanggal_transaksi }}" />
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="bank_id" class="form-label">SUMBER</label>
                                <select id="modal_bank_id" name="bank_id" class="form-control"></select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div>
                                    <p class="text-muted fw-medium text-uppercase">Jenis Transaksi</p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi"
                                            id="jenis_transaksi_1" value="1"
                                            {{ $detail->jenis_transaksi == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_transaksi_1">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi"
                                            id="jenis_transaksi_2" value="2"
                                            {{ $detail->jenis_transaksi == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_transaksi_2">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="tujuan_id" class="form-label text-uppercase">Tujuan</label>
                                <select id="modal_tujuan_id" name="tujuan_id" class="form-control" required></select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="nominal" class="form-label text-uppercase">Nominal</label>
                                <input class="form-control" id="nominal" name="nominal"
                                    value="{{ $detail->nominal }}" />
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="keterangan" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="1">{{ $detail->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto mb-4">
                                <a class="btn btn-warning float-end text-white rounded-5 me-3"
                                    href="{{ route('master_bank_cash.index') }}">
                                    <i class="ri-arrow-go-back-line"></i> Kembali
                                </a>
                                <button class="btn float-end btn-info text-white rounded-5 me-3">
                                    <i class="bx bxs-pencil label-icon align-middle fs-16 me-2"></i> Ubah
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $("#nominal").priceFormat({
                    prefix: 'Rp. ',
                    centsSeparator: ',',
                    thousandsSeparator: '.',
                    centsLimit: 0
                });

            });

            // $("#modal_user_id").select2({
            //     allowClear: true,
            //     width: '100%',
            //     ajax: {
            //         url: "{{ route('api.get_select2_users') }}",
            //         dataType: 'json',
            //         delay: 250,
            //         processResults: function(data) {
            //         return {
            //             results: $.map(data.data, function(item) {
            //                 return {
            //                     id: item.id,
            //                     text: item.name
            //                 }
            //             })
            //         };
            //         }
            //     }
            // });

            $("#modal_bank_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_banks') }}",
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
                }
            });

            $("#modal_tujuan_id").select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_banks_coa') }}",
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
                }
            });

        });

        var dataId = "{{ $detail->bank_id }}"
        var dataName = "{{ $detail->banks_kembali->nama }}"
        var dataBank = {
            id: dataId,
            text: dataName,
            selected: true
        };
        var newOptionBank = new Option(dataBank.text, dataBank.id, false, false)
        $('#modal_bank_id').append(newOptionBank).trigger('change')
        $('#modal_bank_id').select2()

        var dataId = "{{ $detail->tujuan_id }}"
        var dataName = "{{ $detail->coa_kas_kembali->uraian }}"
        var datarole = {
            id: dataId,
            text: dataName,
            selected: true
        };
        var newOptionrole = new Option(datarole.text, datarole.id, false, false)
        $('#modal_tujuan_id').append(newOptionrole).trigger('change')
        $('#modal_tujuan_id').select2()

        function konfirmasi_hapus(id, name) {
            Swal.fire({
                title: "Masukan Alasan menghapus data transaksi " + name,
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    var data = new FormData();
                    data.append('id', id);
                    data.append('alasan', result.value);
                    $.ajax({
                        type: "post",
                        url: "{{ route('softdelete_pengembalian_kas') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            Swal.fire({
                                title: 'Hapus!',
                                text: 'Data berhasil di hapus',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 2500
                            }).then(function() {
                                window.location = "{{ route('master_bank_cash.index') }}"
                            });
                        }
                    });
                }

            });
        }

        function hapus_gambar(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('hapus_foto_kas_kembalian') }}',
                        data: {
                            '_token': $('meta[name=csrf-token]').attr('content'),
                            id: id
                        },
                        type: 'POST',
                        success: function(resp) {
                            if (resp.status == 200) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success",
                                    showConfirmButton: false, // Hide the confirmation button
                                    timer: 1500 // Automatically close after 1.5 seconds
                                });
                                $('#' + id).remove(); // Remove the image
                                $('#carousel' + id).remove(); // Remove the image
                                $('#carousel-role' + id).remove(); // Remove the image
                            } else {
                                Swal.fire("Failed !!!", "An error occurred while deleting the image",
                                    "error");
                            }
                        },
                        error: function() {
                            Swal.fire("Failed !!!", "An error occurred while deleting the image",
                                "error");
                        }
                    });
                }
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
