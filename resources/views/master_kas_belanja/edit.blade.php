@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
@endsection
@include('components.breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-11">
                        <h4 class="card-title mb-0">Edit Kas Belanja</h4>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light float-end" onclick="konfirmasi_hapus('{{ $detail->id }}',`{{ $detail->nomor_transaksi }}`)" target="_blank"><i class="ri-delete-bin-5-line"></i></button>
                        <a href="{{ route('master_kas_belanja.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_kas_belanja.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="row mb-3">
                                @if ($detail->kas_file->isNotEmpty())
                                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            @foreach ($detail->kas_file as $foto => $f)
                                                <button id="carousel-role{{ $f->id }}" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $foto }}" class="active" aria-current="true" aria-label="Slide {{ $foto }}"></button>
                                            @endforeach
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach ($detail->kas_file as $foto => $f)
                                                <div id="carousel{{ $f->id }}" class="carousel-item {{ $foto == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                                    <img id="{{ $f->id }}" class="d-block" width="100%" height="300px" src="{{ asset('kas_belanja').'/'.$f->filename }}" >
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <a href="{{ asset('kas_belanja').'/'.$f->filename }}" target="_blank" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-external-link-line"></i></a>
                                                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="hapus_gambar('{{ $f->id }}')"><i class="ri-delete-bin-5-line"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @endif


                                <div class="col-md-12">
                                    <input class="bg-success" type="file" name="attachment[]" id="attachment" accept="image/*" multiple>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $detail->tanggal_transaksi }}" required/>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div>
                                    <p class="text-muted fw-medium">Jenis Pembayaran</p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenis_transaksi_1" {{ $detail->jenis == 1 ? "checked=''" : "" }}  value="1">
                                        <label class="form-check-label" for="jenis_transaksi_1">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenis_transaksi_2" {{ $detail->jenis == 2 ? "checked=''" : "" }} value="2">
                                        <label class="form-check-label" for="jenis_transaksi_2">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="account_id" class="form-label">SUMBER</label>
                                <select id="modal_account_id" name="account_id" class="form-control" required></select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="keterangan_kas" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan_kas" name="keterangan_kas" rows="3">{{ $detail->keterangan_kas }}</textarea>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-title mb-0">Detail Belanja</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn float-end" type="button" onclick="tambah_detail()" style="background-color:#E0E7FF; color:#4E36E2"><i class="ri-add-box-fill"></i> Tambah Data Baris</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">Akun Belanja</div>
                                            <div class="col-md-3">Keterangan</div>
                                            <div class="col-md-3">Nilai</div>
                                            <div class="col-md-3 text-center"></div>
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        @foreach ($detail->belanja_detail as $belanja => $b)
                                            <div class="row delete_detail mt-2">
                                                <div class="col-md-3">
                                                    <select id="akun_belanja{{ $b->id }}" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input id="keterangan[]" name="keterangan[]" class="form-control" value="{{ $b->keterangan }}" />
                                                </div>
                                                <div class="col-md-3">
                                                    <input class="form-control nilai text-end" number="nilai[]" name="nilai[]" value="{{ $b->nominal }}" onkeyup="countNilai()"  required/>
                                                </div>
                                                <div class="col-md-3 text-center float-end hapus_detail">
                                                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3 text-uppercase">TOTAL</div>
                                            <div class="col-md-3">
                                                <input class="form-control text-end total fs-20 text-white" style="background-color: #4E36E2" id="total_nilai" value="{{ $detail->nominal }}" name="total_nilai" readonly/>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button class="btn float-end" type="button" onclick="tambah_detail()" style="background-color:#E0E7FF; color:#4E36E2"><i class="ri-add-box-fill"></i> Tambah Data Baris</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-success mr-5 rounded-5 bg-animation" style="background-color: #4E36E2"><i class="bx bxs-save label-icon align-middle fs-16 me-2"
                                ></i> Simpan</button>
                                &nbsp;&nbsp;&nbsp;
                            <a href="{{ route('master_kas_belanja.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2">Kembali</a>
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

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    const inputElement = document.querySelector('input[id="attachment"]', {
        acceptedFileTypes: ['image/*'],
        fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise

                resolve(type);
            }),
    });

    const pond = FilePond.create(inputElement);
    const pondBox = document.querySelector('.filepond--root');
    pondBox.addEventListener('FilePond:addfile', e => {
        var fileName = pond.getFile();
    });

    FilePond.setOptions({
        allowMultiple: true,
        server: {
            process: "/upload_foto_kas_belanja",
            headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        }
    });


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
                    url: '{{ route("hapus_foto_kas_belanja") }}',
                    data: { '_token': $('meta[name=csrf-token]').attr('content'), id: id },
                    type: 'POST',
                    success: function (resp) {
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
                            Swal.fire("Failed !!!", "An error occurred while deleting the image", "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Failed !!!", "An error occurred while deleting the image", "error");
                    }
                });
            }
        });
    }

    var data = {id: "{{ $detail->coa_belanja->id }}",text: "{{ $detail->coa_belanja->uraian }}", selected: true};
    var newOption = new Option(data.text, data.id, false, false)
    $('#modal_account_id').append(newOption).trigger('change')
    $('#modal_account_id').select2()

    var f = {!! json_encode($detail->belanja_detail) !!}
    $.each(f, function(i, item) {
        var data = {id: item.account_id,text: item.coa_belanja.uraian, selected: true};
        var newOption = new Option(data.text, data.id, false, false)
        $('#akun_belanja'+item.id).append(newOption).trigger('change')
        $('#akun_belanja'+item.id).select2()
    });

    $(function(){
        $("#modal_account_id").select2({
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

        $(".akun_belanja").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_belanja') }}",
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
        }).on('select2:select', function (e) {
            $("#jenis_sumber").val(e.params.data.item);
        });


    })

    var count = 1
    function tambah_detail() {
        $('.tambah_detail').append(`
            <div class="row delete_detail mt-2">
                <div class="col-md-3">
                    <select id="akun_belanja`+count+++`" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                </div>
                <div class="col-md-3">
                    <input id="keterangan" name="keterangan[]" class="form-control" />
                </div>
                <div class="col-md-3">
                    <input class="form-control nilai text-end" id="nilai" name="nilai[]" onkeyup="countNilai()" required />
                </div>
                <div class="col-md-3 text-center hapus_detail">
                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                </div>
            </div>
        `);

        // Inisialisasi Select2 pada elemen dengan class akun_belanja
        $(".akun_belanja").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_belanja') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                }
            }
        }).on('select2:select', function(e) {
            $("#jenis_sumber").val(e.params.data.item);
        });

        $('.hapus_detail').click(function() {
            $(this).closest('.delete_detail').remove();
            countNilai()
        });

        $(".nilai").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

    }

    $('.hapus_detail').click(function(){
        $(this).closest('.delete_detail').remove();
        countNilai()
    })

    // countNilai()

    function countNilai() {
        var sum_value = 0;
        $('.nilai').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_nilai').val(sum_value);
        })

        $('#total_nilai').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    }

    $(".nilai").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    $('#total_nilai').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function konfirmasi_hapus(id, name){
        Swal.fire({
            title: "Masukan Alasan menghapus data transaksi "+name,
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
                data.append('alasan', result.value);
                $.ajax({
                    type: "post",
                    url: "{{ route('softdelete_kas_belanja') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        Swal.fire({
                            title: 'Hapus!',
                            text: 'Data berhasil di hapus',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        }).then(function(){
                            window.location.href = "{{ route('master_kas_belanja.index') }}";
                        });
                    }
                });
            }

        });
    }

</script>
@endsection
